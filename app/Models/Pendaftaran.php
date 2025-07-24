<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat',
                           'email', 'no_telepon', 'tanggal_pendaftaran', "nama_orang_tua",
                           "no_telepon_orang_tua", "alamat_orang_tua"];
    public $timestamp   = true;
}
