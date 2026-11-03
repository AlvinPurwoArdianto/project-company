<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_informasi', 'slug', 'deskripsi', 'gambar', 'tanggal'];
    public $timestamps = true;

    protected $appends = ['gambar_url'];

    /**
     * Resolve image URL dynamically (R2 CDN or local legacy fallback).
     */
    public function getGambarUrlAttribute(): string
    {
        if (empty($this->gambar)) {
            return asset('user/assets/img/logo mini.png');
        }

        // 1. Direct full CDN URL
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }

        $cdnBase = rtrim(config('filesystems.disks.r2.url', env('R2_PUBLIC_DOMAIN', '')), '/');

        // 2. R2 relative path with folder (e.g. informasi/xyz.jpg)
        if (str_starts_with($this->gambar, 'informasi/')) {
            return $cdnBase ? "{$cdnBase}/{$this->gambar}" : asset("images/{$this->gambar}");
        }

        // 3. Legacy local file in public/images/informasi/
        $localPath = public_path('images/informasi/' . $this->gambar);
        if (file_exists($localPath)) {
            return asset('images/informasi/' . $this->gambar);
        }

        // 4. Fallback to CDN path
        if ($cdnBase) {
            return "{$cdnBase}/informasi/{$this->gambar}";
        }

        return asset('images/informasi/' . $this->gambar);
    }

    /**
     * Delete image from both R2 CDN and local storage if present.
     */
    public function deleteImage(): void
    {
        if (empty($this->gambar)) {
            return;
        }

        // Remove from Cloudflare R2
        try {
            if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
                $path = parse_url($this->gambar, PHP_URL_PATH);
                if ($path) {
                    Storage::disk('r2')->delete(ltrim($path, '/'));
                }
            } elseif (str_starts_with($this->gambar, 'informasi/')) {
                Storage::disk('r2')->delete($this->gambar);
            }
        } catch (\Throwable $e) {
            Log::warning('R2 image delete error: ' . $e->getMessage());
        }

        // Remove from local disk if exists
        $localFile = public_path('images/informasi/' . basename($this->gambar));
        if (file_exists($localFile) && is_file($localFile)) {
            @unlink($localFile);
        }
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'informasi_id');
    }
}
