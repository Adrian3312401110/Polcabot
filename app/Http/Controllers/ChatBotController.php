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

        // 🔹 Gunakan model terbaru dari daftar kamu: gemini-2.5-flash
        $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . env('GEMINI_API_KEY');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'contents' => [[
                'parts' => [[
                    'text' => "Kamu adalah PolCaBot, asisten AI ramah yang menjawab dalam Bahasa Indonesia, menggunakan format Markdown bila perlu, hanya fokus pada topik akademik di Politeknik Negeri Batam, dan menggunakan Markdown bila perlu (**tebal**, *miring*, `kode`, atau daftar).\n\nUser: " . $userMessage
                ]]
            ]]
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Terjadi kesalahan saat menghubungi server Gemini.',
                'error_detail' => $response->json(),
                'raw' => $response->body(),
            ], 500);
        }

        $data = $response->json();

        $text = $data['candidates'][0]['content']['parts'][0]['text']
            ?? 'Maaf, saya tidak dapat memproses permintaan Anda.';

        // 🔹 Konversi Markdown ke HTML aman
        $converter = new CommonMarkConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);

        $html = $converter->convert($text);

        return response()->json(['reply' => $html->__toString()]);
    }
}
