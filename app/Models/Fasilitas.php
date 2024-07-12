<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_fasilitas', 'cover'];
    public $timestamp = true;

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('/images/fasilitas' . $this->cover))) {
            return unlink(public_path('/images/fasilitas' . $this->cover));
        }
    }
}
