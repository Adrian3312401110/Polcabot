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
            ],
            [
                'question' => 'Dimana ruangan Tata Usaha per jurusan?',
                'answer' => 'Untuk jurusan Manajemen Bisnis terletak di gedung TA lantai 2. Untuk jurusan Teknik Informatika terletak di gedung utama lantai 7 ruang 703. Untuk jurusan Teknik Elektro terletak di gedung utama lantai 4 ruang 403. Untuk jurusan Teknik Mesin terletak di gedung utama lantai 2 ruang 203.',
                'keywords' => 'jurusan, Tata Usaha, ruangan',
                'source' => '-'
            ],
            [
                'question' => 'Berapa biaya UKT pada Polibatam',
                'answer' => 'Biaya Uang Kuliah Tunggal mahasiswa menyesuaikan jurusan masing-masing dan cara masuk kedalam Polibatam. Untuk info lebih lanjut bisa dilihat diweb Polibatam.',
                'keywords' => 'Polibatam, biaya, UKT',
                'source' => 'https://registrasi.polibatam.ac.id/informasi-uang-kuliah-tunggal-ukt/'
            ],
            [
                'question' => 'Jurusan apa saja yang ada Polibatam',
                'answer' => 'Terdapat 4 jurusan di Politeknik Negeri Batam, yaitu Jurusan Manajemen Bisnis, Teknik Elektro, Teknik Informatika, Teknik Mesin',
                'keywords' => 'Polibatam, Jurusan,',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => 'Program Studi apa saja yang ada di Polibatam?',
                'answer' => 'Terdapat 26 program studi, yaitu D2 Distribusi Barang, D3 Akuntasi, D3 Teknik Elektronika Manufaktur, D3 Teknik Informatika, D3 Teknik Instrumentasi, D3 Teknik Mesin, D3 Teknik Perawatan Pesawat Udara, D3 Teknologi Geomatika, Program Profesi Insinyur (PSSPII), S2 Terapan Teknik Komputer, D4 Administrasi Bisnis Terapan, D4 Administrasi Bisnis Terapan (International Class), D4 Akuntansi Manajerial, D4 Animasi, D4 Logistis Perdagangan Internasioanl, D4 Rekayasa Keamanan Siber, D4 Rekayasa Perangkat Lunak, D4 Teknik Mekatronika, D4 Teknik Robotika, D4 Teknologi Permainan, D4 Teknologi Rekayasa Elektronika, D4 Teknologi Rekayasa Konstruksi Perkapalan, D4 Teknologi Rekayasa Metalurgi, D4 Teknologi Rekayasa Multimedia, D4 Teknologi Rekayasa Pembangkit Energi, D4 Teknologi Rekayasa Pengelasan dan Fabrikasi ',
                'keywords' => 'Program Studi, Polibatam',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => 'Prodi apa saja yang ada pada jurusan Teknik informatika?',
                'answer' => 'Terdapat 8 prodi pada jurusan Teknik Informatika, yaitu: 1. (D3) Teknik Informatika 2. (D3) Teknologi Geomatika 3. (D4) Animasi 4. (D4) Teknologi Rekayasa Multimedia 5. (D4) Rekayasa Keamanan Siber 6. (D4) Rekayasa Perangkat Lunak 7. (D4) Teknologi Permainan 8. S2 Rekayasa/Teknik Komputer.',
                'keywords' => 'prodi, jurusan, teknik informatika, program studi',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => 'Prodi apa saja yang ada pada jurusan Manajemen Bisnis?',
                'answer' => 'Terdapat 6 prodi pada jurusan Manajemen Bisnis, yaitu: 1. (D3) Akuntasi 2. (D4) Akuntasi Manajerial 3. (D4) Administrasi Bisnis Terapan 4. (D4) Administrasi Bisnis Terapan (Internasional Class) 5. (D4) Logistik Perdagangan Internasioanl 6. (D2) Distribusi Barang.',
                'keywords' => 'prodi, jurusan, manajemen bisnis, program studi',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => 'Prodi apa saja yang ada pada jurusan Teknik Elektro?',
                'answer' => 'Terdapat 6 prodi pada jurusan Teknik Elektro, yaitu: 1. (D3) Teknik Elektro Manufaktur 2. (D4) Teknologi Rekayasa Elektronika 3. (D3) Teknik Instrumentasi 4. (D4) Teknik Mekatronika 5. (D4) Teknologi Rekayasa Pembangkit Energi 6. (D4) Teknologi Rekayasa Robotika.',
                'keywords' => 'prodi, jurusan, Teknik Elektro, program studi',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => 'Prodi apa saja yang ada pada jurusan Teknik Mesin?',
                'answer' => 'Terdapat 6 prodi pada jurusan Teknik Mesin, yaitu: 1. (D3) Teknik Mesin 2. (D3) Teknik Perawatan Pesawat Udara 3. (D4) Teknologi Rekayasa Konstruksi Perkapalan 4. (D4) Teknologi Rekayasa Pengelasan dan Fabrikasi 5. (D4) Teknologi Rekayasa Metalurgi 6. Program Profesi Insinyur (PSPPI).',
                'keywords' => 'prodi, jurusan, Teknik Mesin, program studi',
                'source' => 'https://registrasi.polibatam.ac.id/program-studi/'
            ],
            [
                'question' => '',
                'answer' => '',
                'keywords' => '',
                'source' => ''
            ],
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