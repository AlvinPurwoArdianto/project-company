<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'komentar', 'informasi_id'];
    public $timestamps = true;

    public function informasi()
    {
        return $this->belongsTo(Informasi::class, 'informasi_id');
    }
}
