<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\CommonMarkConverter;
use LucianoTonet\GroqLaravel\Facades\Groq;

class ChatBotController extends Controller
{
    /**
     * Tampilkan halaman training AI
     */
    public function showTraining()
    {
        return view('admin.training');
    }

    /**
     * Handle chat message
     */
    public function chat(Request $request)
    {
        $userMessage = trim($request->input('message', ''));

        if (!$userMessage) {
            return response()->json(['reply' => 'Pesan tidak boleh kosong.'], 400);
        }

        Log::info('💬 User Question: ' . $userMessage);

        /* ===========================================================
         * 1. IMPROVED KNOWLEDGE BASE SEARCH
         * =========================================================== */
        $answer = $this->searchKnowledgeBase($userMessage);
        
        if ($answer) {
            Log::info('✅ Answer found in Knowledge Base');
            
            $formattedAnswer = nl2br(e($answer['answer'])) .
                "<br><br><small><b>📌 Sumber:</b> " .
                "<a href='" . e($answer['source']) . "' target='_blank' rel='noopener noreferrer'>" . 
                e($answer['source']) . "</a></small>";

            // Simpan history
            $this->saveChatHistoryIfAuth(Auth::id(), $userMessage, strip_tags($answer['answer']));

            return response()->json([
                'reply' => $formattedAnswer,
                'source' => 'knowledge_base'
            ]);
        }

        Log::info('⚠️ Not found in KB, trying Groq API...');

        /* ===========================================================
         * 2. FALLBACK KE GROQ API
         * =========================================================== */
        try {
            $systemPrompt = $this->getSystemPrompt();

            $response = Groq::chat()->completions()->create([
                'model' => env('GROQ_MODEL', 'llama-3.1-8b-instant'),
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userMessage],
                ],
                'max_tokens' => 512,
                'temperature' => 0.7,
            ]);

            $aiText = null;
            if (isset($response['choices'][0]['message']['content'])) {
                $aiText = $response['choices'][0]['message']['content'];
            } elseif (isset($response['choices'][0]['text'])) {
                $aiText = $response['choices'][0]['text'];
            }

            if ($aiText) {
                Log::info('✅ Groq API responded');
                
                // Convert Markdown ke HTML
                $converter = new CommonMarkConverter([
                    'html_input' => 'strip',
                    'allow_unsafe_links' => false,
                ]);
                $html = $converter->convert($aiText)->getContent();

                // Simpan history
                $this->saveChatHistoryIfAuth(Auth::id(), $userMessage, strip_tags($aiText));

                return response()->json([
                    'reply' => $html,
                    'source' => 'groq'
                ]);
            }

        } catch (\Throwable $e) {
            Log::error('❌ Groq Error: ' . $e->getMessage());
        }

        /* ===========================================================
         * 3. FALLBACK TERAKHIR
         * =========================================================== */
        Log::warning('⚠️ Using fallback response');
        
        return response()->json([
            'reply' => $this->getFallbackResponse(),
            'source' => 'fallback'
        ]);
    }

    /**
     * IMPROVED: Search Knowledge Base dengan multiple strategi
     */
    private function searchKnowledgeBase($userMessage)
    {
        $tables = [
            'organisasi_knowledge',
            'beasiswa_knowledge',
            'jurusan_knowledge',
            'daftar_knowledge'
        ];

        // Normalisasi
        $normalized = $this->normalizeText($userMessage);
        $keywords = $this->extractKeywords($normalized);
        
        Log::info('🔍 Normalized: ' . $normalized);
        Log::info('🔑 Keywords: ' . implode(', ', $keywords));

        foreach ($tables as $table) {
            // Cek apakah table exist
            if (!$this->tableExists($table)) {
                continue;
            }

            // STRATEGI 1: Exact Match Question
            $result = DB::table($table)
                ->whereRaw('LOWER(question) = ?', [$normalized])
                ->first();
            
            if ($result) {
                Log::info('✅ Found: EXACT MATCH in ' . $table);
                return [
                    'answer' => $result->answer,
                    'source' => $result->source
                ];
            }

            // STRATEGI 2: Question Contains User Message
            $result = DB::table($table)
                ->whereRaw('LOWER(question) LIKE ?', ["%{$normalized}%"])
                ->first();
            
            if ($result) {
                Log::info('✅ Found: QUESTION CONTAINS in ' . $table);
                return [
                    'answer' => $result->answer,
                    'source' => $result->source
                ];
            }

            // STRATEGI 3: Search by Keywords
            if (!empty($keywords)) {
                foreach ($keywords as $keyword) {
                    // Cek di kolom keywords (jika ada)
                    if ($this->columnExists($table, 'keywords')) {
                        $result = DB::table($table)
                            ->whereRaw('LOWER(keywords) LIKE ?', ["%{$keyword}%"])
                            ->first();
                        
                        if ($result) {
                            Log::info('✅ Found: KEYWORD MATCH (' . $keyword . ') in ' . $table);
                            return [
                                'answer' => $result->answer,
                                'source' => $result->source
                            ];
                        }
                    }

                    // Cek di question
                    $result = DB::table($table)
                        ->whereRaw('LOWER(question) LIKE ?', ["%{$keyword}%"])
                        ->first();
                    
                    if ($result) {
                        Log::info('✅ Found: KEYWORD in QUESTION (' . $keyword . ') in ' . $table);
                        return [
                            'answer' => $result->answer,
                            'source' => $result->source
                        ];
                    }

                    // Cek di answer
                    $result = DB::table($table)
                        ->whereRaw('LOWER(answer) LIKE ?', ["%{$keyword}%"])
                        ->first();
                    
                    if ($result) {
                        Log::info('✅ Found: KEYWORD in ANSWER (' . $keyword . ') in ' . $table);
                        return [
                            'answer' => $result->answer,
                            'source' => $result->source
                        ];
                    }
                }
            }

            // STRATEGI 4: Fuzzy Match (any keyword match)
            if (!empty($keywords)) {
                $query = DB::table($table);
                
                foreach ($keywords as $index => $keyword) {
                    if ($index === 0) {
                        $query->where(function($q) use ($keyword, $table) {
                            $q->whereRaw('LOWER(question) LIKE ?', ["%{$keyword}%"])
                              ->orWhereRaw('LOWER(answer) LIKE ?', ["%{$keyword}%"]);
                            
                            if ($this->columnExists($table, 'keywords')) {
                                $q->orWhereRaw('LOWER(keywords) LIKE ?', ["%{$keyword}%"]);
                            }
                        });
                    } else {
                        $query->orWhere(function($q) use ($keyword, $table) {
                            $q->whereRaw('LOWER(question) LIKE ?', ["%{$keyword}%"])
                              ->orWhereRaw('LOWER(answer) LIKE ?', ["%{$keyword}%"]);
                            
                            if ($this->columnExists($table, 'keywords')) {
                                $q->orWhereRaw('LOWER(keywords) LIKE ?', ["%{$keyword}%"]);
                            }
                        });
                    }
                }
                
                $result = $query->first();
                
                if ($result) {
                    Log::info('✅ Found: FUZZY MATCH in ' . $table);
                    return [
                        'answer' => $result->answer,
                        'source' => $result->source
                    ];
                }
            }
        }

        Log::info('❌ Not found in any table');
        return null;
    }

    /**
     * Normalize text untuk search
     */
    private function normalizeText($text)
    {
        $text = mb_strtolower(trim($text));
        $text = rtrim($text, '?.!,;');
        $text = preg_replace('/\s+/', ' ', $text);
        return $text;
    }

    /**
     * Extract keywords dari pesan
     */
    private function extractKeywords($message)
    {
        $stopwords = [
            'apa', 'apakah', 'ada', 'yang', 'di', 'ke', 'dari', 'untuk', 
            'dengan', 'adalah', 'pada', 'bagaimana', 'mengapa', 'siapa', 
            'dimana', 'kapan', 'berapa', 'tentang', 'ini', 'itu', 'saya',
            'the', 'is', 'are', 'what', 'where', 'when', 'how', 'why',
            'a', 'an', 'and', 'or', 'but', 'in', 'on', 'at', 'to', 'for',
            'bisa', 'dapat', 'berfokus', 'fokus'
        ];
        
        $words = explode(' ', $message);
        
        $keywords = array_filter($words, function($word) use ($stopwords) {
            return strlen($word) >= 3 && !in_array($word, $stopwords);
        });
        
        return array_values($keywords);
    }

    /**
     * Check if table exists
     */
    private function tableExists($table)
    {
        try {
            DB::table($table)->limit(1)->get();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Check if column exists in table
     */
    private function columnExists($table, $column)
    {
        try {
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
            return in_array($column, $columns);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get fallback response
     */
    private function getFallbackResponse()
    {
        return "⚠️ Maaf, saya tidak dapat menemukan jawaban yang tepat untuk pertanyaan Anda.<br><br>" .
               "<b>💡 Tips:</b><br>" .
               "• Coba gunakan kata kunci yang lebih spesifik<br>" .
               "• Tanyakan tentang: organisasi, jurusan, beasiswa, atau pendaftaran<br>" .
               "• Contoh: 'Ada organisasi olahraga?', 'Jurusan apa saja di Polibatam?'<br><br>" .
               "<b>Politeknik Negeri Batam</b> adalah perguruan tinggi negeri vokasi " .
               "dengan fokus pada teknik, bisnis, dan kreatif digital.<br><br>" .
               "Silakan ajukan pertanyaan lain! 😊";
    }

    /**
     * Update system prompt untuk AI
     */
    public function updatePrompt(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:5000'
        ]);

        try {
            DB::table('ai_settings')->updateOrInsert(
                ['key' => 'system_prompt'],
                [
                    'value' => $request->prompt,
                    'updated_at' => now()
                ]
            );

            Cache::forget('system_prompt');

            return response()->json([
                'success' => true,
                'message' => 'System prompt berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui prompt: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get system prompt untuk AI
     */
    public function getPrompt()
    {
        try {
            $prompt = $this->getSystemPrompt();

            return response()->json([
                'success' => true,
                'prompt' => $prompt
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil prompt: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Helper: Ambil system prompt dari DB atau default
     */
    private function getSystemPrompt()
    {
        return Cache::remember('system_prompt', 3600, function () {
            $setting = DB::table('ai_settings')
                ->where('key', 'system_prompt')
                ->first();

            if ($setting && $setting->value) {
                return $setting->value;
            }

            return "Kamu adalah PolCaBot, asisten virtual resmi Politeknik Negeri Batam.\n\n" .
                   "TUGAS:\n" .
                   "- Menjawab pertanyaan tentang Polibatam dengan ramah dan informatif\n" .
                   "- Fokus pada: akademik, organisasi, jurusan, beasiswa, fasilitas\n" .
                   "- Gunakan Bahasa Indonesia yang sopan\n" .
                   "- Jika tidak tahu, akui dengan jujur\n\n" .
                   "GAYA:\n" .
                   "- Ramah dan membantu\n" .
                   "- Singkat dan jelas\n" .
                   "- Gunakan emoji secukupnya 😊\n";
        });
    }

    /**
     * Reset prompt ke default
     */
    public function resetPrompt()
    {
        try {
            DB::table('ai_settings')
                ->where('key', 'system_prompt')
                ->delete();

            Cache::forget('system_prompt');

            return response()->json([
                'success' => true,
                'message' => 'Prompt berhasil direset ke default!',
                'prompt' => $this->getSystemPrompt()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mereset prompt: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save chat to history only if user authenticated
     */
    private function saveChatHistoryIfAuth($userId, $message, $reply)
    {
        try {
            if (!$userId) return;
            
            // Cek apakah table chat_history exist
            if (!$this->tableExists('chat_history')) {
                return;
            }
            
            DB::table('chat_history')->insert([
                'user_id' => $userId,
                'message' => $message,
                'reply' => $reply,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save chat history: ' . $e->getMessage());
        }
    }
}