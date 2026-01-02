<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'question' => 'Apakah ada organisasi yang berfokus pada olahraga di Polibatam?',
                'answer' => 'Ada, yaitu Komite Olahraga Polibatam (KOP). KOP adalah organisasi kemahasiswaan yang menaungi berbagai cabang olahraga seperti futsal, basket, voli, badminton, dan lainnya.',
                'keywords' => 'organisasi, olahraga, polibatam',
                'source' => 'https://www.instagram.com/kop.polibatam/'
            ],
            [
                'question' => 'Organisasi apa saja yang ada di Polibatam?',
                'answer' => 'Polibatam memiliki berbagai organisasi kemahasiswaan seperti HIMA (Himpunan Mahasiswa per jurusan), KOP (Komite Olahraga), Unit Kegiatan Mahasiswa (UKM) seperti Paduan Suara, Fotografi, Bahasa, dan lainnya.',
                'keywords' => 'organisasi, polibatam, hima, ukm, kemahasiswaan, kegiatan',
                'source' => 'https://polibatam.ac.id/kemahasiswaan'
            ],
            [
                'question' => 'Bagaimana cara bergabung dengan organisasi di Polibatam?',
                'answer' => 'Untuk bergabung dengan organisasi di Polibatam, mahasiswa baru biasanya dapat mendaftar saat masa orientasi atau open recruitment yang diadakan setiap awal semester. Informasi pendaftaran biasanya diumumkan melalui media sosial masing-masing organisasi.',
                'keywords' => 'bergabung, daftar, organisasi, polibatam, recruitment, cara',
                'source' => 'https://polibatam.ac.id/kemahasiswaan'
            ],
            [
                'question' => 'Apa itu HIMA di Polibatam?',
                'answer' => 'HIMA (Himpunan Mahasiswa) adalah organisasi kemahasiswaan yang berbasis program studi. Setiap jurusan di Polibatam memiliki HIMA sendiri yang berfungsi sebagai wadah aspirasi mahasiswa dan penyelenggara kegiatan akademik maupun non-akademik.',
                'keywords' => 'hima, himpunan, mahasiswa, organisasi, jurusan, program studi',
                'source' => 'https://polibatam.ac.id/kemahasiswaan'
            ],
            [
                'question' => 'Apakah ada organisasi fotografi di Polibatam?',
                'answer' => 'Ada, yaitu UKM Fotografi Polibatam. Organisasi ini menampung mahasiswa yang memiliki minat di bidang fotografi dan videografi.',
                'keywords' => 'ukm, fotografi, videografi, organisasi, polibatam, kamera',
                'source' => 'https://www.instagram.com/fotografi.polibatam/'
            ]
        ];

        foreach ($data as $item) {
            DB::table('organisasi_knowledge')->insert([
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