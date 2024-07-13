<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'email', 'no_telepon', 'tanggal_pendaftaran'];
    public $timestamp = true;
}
