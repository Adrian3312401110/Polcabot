<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\CommonMark\CommonMarkConverter;

class ChatBotController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');

        if (!$userMessage) {
            return response()->json(['reply' => 'Pesan tidak boleh kosong.'], 400);
        }

        // 🔹 API lokal Ollama (LLaMA 3.1)
        $apiUrl = 'http://localhost:11434/api/generate';

        $response = Http::post($apiUrl, [
            'model' => 'llama3.1',
            'prompt' => "Kamu adalah PolCaBot, asisten AI ramah yang menjawab dalam Bahasa Indonesia dengan sangat jelas dan juga bahasa inggris jika penanya memang memakai bahasa inggris atau minta pakai bahasa inggris, hanya fokus pada topik akademik di Politeknik Negeri Batam, peringatkan user jika menanyakan topik yang sensitif dan saran yang terkait, dan menggunakan Markdown bila perlu (**tebal**, *miring*, `kode`, atau daftar dan emote).\n\nUser: " . $userMessage,
            'stream' => false,
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Terjadi kesalahan saat menghubungi LLaMA lokal.',
                'error_detail' => $response->json(),
            ], 500);
        }

        $data = $response->json();
        $text = $data['response'] ?? 'Maaf, saya tidak dapat memproses permintaan Anda.';

        // 🔹 Konversi Markdown ke HTML
        $converter = new CommonMarkConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);

        $html = $converter->convert($text);

        return response()->json(['reply' => $html->__toString()]);
    }
}
