<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeasiswaKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'question' => 'Apakah ada beasiswa di Polibatam?',
                'answer' => 'Ada, yaitu beasiswa yang ditawarkan oleh Polibatam untuk mahasiswa baru dan mahasiswa aktif. Informasi lebih lanjut dapat ditemukan di situs resmi Polibatam.',
                'keywords' => 'beasiswa, polibatam, apakah',
                'source' => 'https://polibatam.ac.id'
            ]
        ];

        foreach ($data as $item) {
            DB::table('beasiswa_knowledge')->insert([
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