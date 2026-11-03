<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\Informasi;
use App\Models\Program;
use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Programs
        $programs = [
            [
                'nama_program' => 'English for Children (TK & SD)',
                'deskripsi'    => 'Fondasi bahasa Inggris menyenangkan melalui metode bermain, bernyanyi, visual interaktif, dan kosakata dasar sehari-hari yang membangun kepercayaan diri sejak dini.',
            ],
            [
                'nama_program' => 'English for Teens (SMP & SMA)',
                'deskripsi'    => 'Penguatan tata bahasa (grammar), penulisan akademik, serta pembiasaan percakapan aktif untuk mendukung prestasi sekolah dan lomba debat/pidato.',
            ],
            [
                'nama_program' => 'General English & Conversation',
                'deskripsi'    => 'Fokus pada kelancaran berbicara (fluency), pelafalan (pronunciation), dan percakapan kontekstual untuk mahasiswa serta profesional karier.',
            ],
            [
                'nama_program' => 'TOEFL / IELTS Preparation',
                'deskripsi'    => 'Strategi intensif menghadapi tes resmi TOEFL dan IELTS, dilengkapi bedah soal terstruktur, tips & trik jitu, serta simulasi ujian (mock test) berkala.',
            ],
        ];

        foreach ($programs as $p) {
            Program::firstOrCreate(
                ['nama_program' => $p['nama_program']],
                ['deskripsi' => $p['deskripsi']]
            );
        }

        // 2. Fasilitas
        $fasilitas = [
            [
                'nama_fasilitas' => 'Ruang Kelas Ber-AC & Nyaman',
                'cover'          => 'fasilitas-kelas.jpg',
            ],
            [
                'nama_fasilitas' => 'Laboratorium Multimedia Audio-Visual',
                'cover'          => 'fasilitas-multimedia.jpg',
            ],
            [
                'nama_fasilitas' => 'Gedung Pembelajaran Representatif',
                'cover'          => 'fasilitas-gedung.jpg',
            ],
            [
                'nama_fasilitas' => 'Reading Corner & Perpustakaan Mini',
                'cover'          => 'fasilitas-library.jpg',
            ],
            [
                'nama_fasilitas' => 'Lobby & Ruang Tunggu Bersih',
                'cover'          => 'fasilitas-ruang-tunggu.jpg',
            ],
            [
                'nama_fasilitas' => 'Area Belajar & Free High-Speed Wi-Fi',
                'cover'          => 'fasilitas-wifi.jpg',
            ],
        ];

        foreach ($fasilitas as $f) {
            Fasilitas::firstOrCreate(
                ['nama_fasilitas' => $f['nama_fasilitas']],
                ['cover' => $f['cover']]
            );
        }

        // 3. Informasi / Artikel
        $informasis = [
            [
                'nama_informasi' => '5 Tips Efektif Bicara Bahasa Inggris Percaya Diri Tanpa Ragu',
                'slug'           => '5-tips-efektif-bicara-bahasa-inggris-percaya-diri',
                'deskripsi'      => 'Banyak orang merasa ragu saat mulai berbicara bahasa Inggris karena takut salah grammar. Simak 5 langkah sederhana melatih mental berbicara lancar dan spontan setiap hari.',
                'gambar'         => 'info-tips-speaking.jpg',
                'tanggal'        => now()->subDays(2)->toDateString(),
            ],
            [
                'nama_informasi' => 'Pentingnya Skor TOEFL & IELTS untuk Meraih Beasiswa Impian',
                'slug'           => 'pentingnya-skor-toefl-ielts-meraih-beasiswa',
                'deskripsi'      => 'Persiapan tes kemampuan bahasa Inggris membutuhkan strategi jitu. Pelajari format soal, pembagian waktu, dan cara mencapai target skor maksimal untuk beasiswa luar negeri.',
                'gambar'         => 'info-toefl-ielts.jpg',
                'tanggal'        => now()->subDays(5)->toDateString(),
            ],
            [
                'nama_informasi' => 'Metode Belajar Interaktif Victory English School yang Menyenangkan',
                'slug'           => 'metode-belajar-interaktif-victory-english-school',
                'deskripsi'      => 'Belajar bahasa bukan sekadar menghafal rumus, melainkan mempraktikkannya. Kenali pendekatan komunikatif yang kami terapkan untuk mempercepat penguasaan bahasa siswa.',
                'gambar'         => 'info-metode-victory.jpg',
                'tanggal'        => now()->subDays(8)->toDateString(),
            ],
            [
                'nama_informasi' => 'Pembukaan Pendaftaran Kelas Baru Semester Ini - Kuota Terbatas!',
                'slug'           => 'pembukaan-pendaftaran-kelas-baru-semester-ini',
                'deskripsi'      => 'Kabar gembira bagi Anda yang ingin meningkatkan kecakapan bahasa Inggris! Pendaftaran kelas baru telah dibuka untuk program anak, remaja, hingga kelas dewasa.',
                'gambar'         => 'info-pendaftaran-baru.jpg',
                'tanggal'        => now()->subDays(12)->toDateString(),
            ],
        ];

        foreach ($informasis as $inf) {
            Informasi::firstOrCreate(
                ['slug' => $inf['slug']],
                [
                    'nama_informasi' => $inf['nama_informasi'],
                    'deskripsi'      => $inf['deskripsi'],
                    'gambar'         => $inf['gambar'],
                    'tanggal'        => $inf['tanggal'],
                ]
            );
        }

        // 4. Testimoni (Approved status so they render on the frontend)
        $testimonis = [
            [
                'nama'      => 'Sarah Amalia (Mahasiswi)',
                'testimoni' => 'Metode belajarnya sangat interaktif! Dulu saya sangat grogi saat harus speaking, sekarang sudah jauh lebih lancar dan percaya diri saat presentasi tugas kuliah bahasa Inggris.',
                'rating'    => 5,
                'status'    => 'approved',
            ],
            [
                'nama'      => 'Budi Wicaksono (Karyawan Swasta)',
                'testimoni' => 'Instrukturnya sangat ramah dan sabar membimbing dari dasar. Suasana kelasnya santai tapi fokus, materi TOEFL yang sulit jadi mudah dipahami.',
                'rating'    => 5,
                'status'    => 'approved',
            ],
            [
                'nama'      => 'Nabila Putri (Alumni Teens Class)',
                'testimoni' => 'Saya ikut program English for Teens di sini selama 1 tahun. Progresnya luar biasa, nilai bahasa Inggris di sekolah meningkat drastis dan saya jadi suka nonton film tanpa subtitle!',
                'rating'    => 5,
                'status'    => 'approved',
            ],
            [
                'nama'      => 'Rian Pratama (Professional)',
                'testimoni' => 'Victory English School tempat terbaik belajar conversation. Sangat membantu karier saya saat harus meeting dengan klien luar negeri.',
                'rating'    => 5,
                'status'    => 'approved',
            ],
            [
                'nama'      => 'Dewi Lestari (Orang Tua Siswa)',
                'testimoni' => 'Anak saya senang sekali belajar di sini. Fasilitasnya lengkap dan tutornya pintar menghidupkan suasana kelas dengan games edukatif. Sangat kami rekomendasikan!',
                'rating'    => 5,
                'status'    => 'approved',
            ],
        ];

        foreach ($testimonis as $t) {
            Testimoni::firstOrCreate(
                ['nama' => $t['nama']],
                [
                    'testimoni' => $t['testimoni'],
                    'rating'    => $t['rating'],
                    'status'    => $t['status'],
                ]
            );
        }
    }
}
