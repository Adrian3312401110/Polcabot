<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'question' => 'Apakah ada Jurusan yang berfokus pada game di Polibatam?',
                'answer' => 'Ada, yaitu Jurusan Teknik Informatika dengan konsentrasi Game Development. Jurusan ini menawarkan program studi yang mempelajari pengembangan game mulai dari konsep, desain, hingga pemrograman.',
                'keywords' => 'jurusan, game, polibatam',
                'source' => 'https://polibatam.ac.id/jurusan'
            ]
        ];

        foreach ($data as $item) {
            DB::table('jurusan_knowledge')->insert([
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