<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'question' => 'Bagaimana cara daftar kuliah di Polibatam?',
                'answer' => 'Untuk mendaftar kuliah di Polibatam, Anda dapat mengikuti langkah-langkah berikut: 1. Kunjungi situs resmi Polibatam di https://polibatam.ac.id. 2. Cari informasi tentang penerimaan mahasiswa baru. 3. Isi formulir pendaftaran online dengan data yang benar. 4. Unggah dokumen yang diperlukan seperti ijazah, transkrip nilai, dan pas foto. 5. Bayar biaya pendaftaran sesuai dengan petunjuk yang diberikan. 6. Tunggu pengumuman hasil seleksi.',
                'keywords' => 'daftar, kuliah, polibatam',
                'source' => 'https://polibatam.ac.id'
            ]
        ];

        foreach ($data as $item) {
            DB::table('daftar_knowledge')->insert([
                'question' => $item['question'],
                'answer' => $item['answer'],
                'keywords' => $item['keywords'],
                'source' => $item['source'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}