<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $datasets = [
            [
                'question' => 'Apakah ada organisasi yang berfokus pada olahraga?',
                'answer' => 'Ada, yaitu Komite Olahraga POlibatam yang mengorganisir berbagai kegiatan olahraga untuk mahasiswa.',
                'keywords' => json_encode(['olahraga', 'komite', 'polibatam', 'futsal', 'basket', 'voli']),
                'source' => 'https://www.instagram.com/komiteolahragapolibatam/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah ada organisasi yang berfokus pada belajar bahasa inggris?',
                'answer' => 'Ada, yaitu English Club Polibatam yang fokus meningkatkan kemampuan berbahasa Inggris mahasiswa melalui berbagai kegiatan seperti conversation class dan debate.',
                'keywords' => json_encode(['english', 'bahasa inggris', 'english club', 'conversation', 'debate']),
                'source' => 'https://www.instagram.com/englishclub_polibatam/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apa itu HMIF?',
                'answer' => 'HMIF (Himpunan Mahasiswa Informatika) adalah organisasi kemahasiswaan tingkat jurusan yang menaungi mahasiswa program studi Teknik Informatika di Polibatam.',
                'keywords' => json_encode(['hmif', 'himpunan', 'informatika', 'jurusan', 'mahasiswa', 'TI']),
                'source' => 'https://www.instagram.com/hmif_polibatam/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara bergabung dengan organisasi di Polibatam?',
                'answer' => 'Mahasiswa dapat bergabung dengan mengikuti open recruitment yang biasanya diadakan setiap awal semester atau menghubungi pengurus organisasi yang diminati.',
                'keywords' => json_encode(['recruitment', 'bergabung', 'daftar', 'organisasi', 'semester']),
                'source' => 'https://www.polibatam.ac.id/organisasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah ada organisasi seni dan budaya?',
                'answer' => 'Ya, ada Unit Kegiatan Mahasiswa (UKM) Seni yang membawahi berbagai bidang seni seperti tari, musik, teater, dan seni rupa.',
                'keywords' => json_encode(['ukm', 'seni', 'budaya', 'tari', 'musik', 'teater']),
                'source' => 'https://www.polibatam.ac.id/ukm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('organisasi_knowledge')->insert($datasets);
    }
}