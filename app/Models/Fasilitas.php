<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_fasilitas', 'cover'];
    public $timestamps = true;

    protected $appends = ['cover_url'];

    /**
     * Resolve cover URL dynamically (R2 CDN or local legacy fallback).
     */
    public function getCoverUrlAttribute(): string
    {
        if (empty($this->cover)) {
            return asset('user/assets/img/logo mini.png');
        }

        // 1. Direct full CDN URL
        if (str_starts_with($this->cover, 'http://') || str_starts_with($this->cover, 'https://')) {
            return $this->cover;
        }

        $cdnBase = rtrim(config('filesystems.disks.r2.url', env('R2_PUBLIC_DOMAIN', '')), '/');

        // 2. R2 relative path with folder (e.g. fasilitas/xyz.jpg)
        if (str_starts_with($this->cover, 'fasilitas/')) {
            return $cdnBase ? "{$cdnBase}/{$this->cover}" : asset("images/{$this->cover}");
        }

        // 3. Legacy local file in public/images/fasilitas/
        $localPath = public_path('images/fasilitas/' . $this->cover);
        if (file_exists($localPath)) {
            return asset('images/fasilitas/' . $this->cover);
        }

        // 4. Fallback to CDN path
        if ($cdnBase) {
            return "{$cdnBase}/fasilitas/{$this->cover}";
        }

        return asset('images/fasilitas/' . $this->cover);
    }

    /**
     * Delete image from both R2 CDN and local storage if present.
     */
    public function deleteImage(): void
    {
        if (empty($this->cover)) {
            return;
        }

        // Remove from Cloudflare R2
        try {
            if (str_starts_with($this->cover, 'http://') || str_starts_with($this->cover, 'https://')) {
                $path = parse_url($this->cover, PHP_URL_PATH);
                if ($path) {
                    Storage::disk('r2')->delete(ltrim($path, '/'));
                }
            } elseif (str_starts_with($this->cover, 'fasilitas/')) {
                Storage::disk('r2')->delete($this->cover);
            }
        } catch (\Throwable $e) {
            Log::warning('R2 image delete error: ' . $e->getMessage());
        }

        // Remove from local disk if exists
        $localFile = public_path('images/fasilitas/' . basename($this->cover));
        if (file_exists($localFile) && is_file($localFile)) {
            @unlink($localFile);
        }
    }
}
