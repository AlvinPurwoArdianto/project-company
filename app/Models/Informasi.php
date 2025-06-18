<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_informasi', 'deskripsi', 'gambar', 'tanggal'];
    public $timestamp = true;

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('/images/informasi' . $this->gambar))) {
            return unlink(public_path('/images/informasi' . $this->gambar));
        }
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'informasi_id');
    }
}
