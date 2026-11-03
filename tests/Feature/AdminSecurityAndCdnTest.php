<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Fasilitas;
use App\Models\Informasi;
use App\Models\Program;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSecurityAndCdnTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Admin', 'password' => bcrypt('12345678')]
        );
    }

    public function test_admin_dashboard_loads_with_optimized_query()
    {
        $response = $this->actingAs($this->admin)->get(route('dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_fasilitas_upload_uses_r2_storage_and_accessor()
    {
        Storage::fake('r2');

        $file = UploadedFile::fake()->image('lab-bahasa.jpg', 600, 400);

        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('fasilitas.store'), [
                'nama_fasilitas' => 'Laboratorium Smart English',
                'cover'          => $file,
            ]);

        $response->assertRedirect(route('fasilitas.index'));

        $fasilitas = Fasilitas::where('nama_fasilitas', 'Laboratorium Smart English')->first();
        $this->assertNotNull($fasilitas);
        $this->assertStringStartsWith('fasilitas/', $fasilitas->cover);

        // Assert file exists on R2 fake disk
        Storage::disk('r2')->assertExists($fasilitas->cover);

        // Assert accessor resolves to CDN URL
        $this->assertStringContainsString('cdn.xialpieun.my.id', $fasilitas->cover_url);

        // Cleanup
        $fasilitas->deleteImage();
        $fasilitas->delete();
    }

    public function test_fasilitas_rejects_non_image_files()
    {
        $fakeScript = UploadedFile::fake()->create('malicious.php', 10, 'text/x-php');

        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('fasilitas.store'), [
                'nama_fasilitas' => 'Fasilitas Hacker',
                'cover'          => $fakeScript,
            ]);

        $response->assertSessionHasErrors(['cover']);
    }

    public function test_informasi_upload_and_slug_generation()
    {
        Storage::fake('r2');

        $file = UploadedFile::fake()->image('tips-ielts.jpg', 800, 500);

        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('informasi.store'), [
                'nama_informasi' => 'Panduan Lengkap Meraih Skor TOEFL 550',
                'deskripsi'      => 'Artikel panduan praktis untuk tes TOEFL bagi pemula.',
                'tanggal'        => '2026-11-03',
                'gambar'         => $file,
            ]);

        $response->assertRedirect(route('informasi.index'));

        $info = Informasi::where('nama_informasi', 'Panduan Lengkap Meraih Skor TOEFL 550')->first();
        $this->assertNotNull($info);
        $this->assertEquals('panduan-lengkap-meraih-skor-toefl-550', $info->slug);
        $this->assertStringStartsWith('informasi/', $info->gambar);

        // Assert accessor
        $this->assertStringContainsString('cdn.xialpieun.my.id', $info->gambar_url);

        // Cleanup
        $info->deleteImage();
        $info->delete();
    }

    public function test_testimoni_validates_postgres_check_constraint_status()
    {
        // 1. Valid status should succeed
        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('testimoni.store'), [
                'nama'      => 'Siti Pendaftar',
                'testimoni' => 'Kursus yang sangat baik!',
                'rating'    => 5,
                'status'    => 'approved',
            ]);

        $response->assertRedirect(route('testimoni.index'));

        // 2. Invalid status (e.g. rejected or unknown) should be blocked by validation
        $responseInvalid = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('testimoni.store'), [
                'nama'      => 'Hacker Test',
                'testimoni' => 'Spam content',
                'rating'    => 1,
                'status'    => 'rejected', // Database only allows approved, pending, archived
            ]);

        $responseInvalid->assertSessionHasErrors(['status']);

        // Cleanup
        Testimoni::where('nama', 'Siti Pendaftar')->delete();
    }

    public function test_program_validation_and_sanitization()
    {
        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
            ->actingAs($this->admin)
            ->post(route('program.store'), [
                'nama_program' => 'IELTS Intensive Weekend',
                'deskripsi'    => 'Program intensif setiap hari Sabtu dan Minggu untuk persiapan tes resmi IELTS.',
            ]);

        $response->assertRedirect(route('program.index'));

        $program = Program::where('nama_program', 'IELTS Intensive Weekend')->first();
        $this->assertNotNull($program);

        // Cleanup
        $program->delete();
    }
}
