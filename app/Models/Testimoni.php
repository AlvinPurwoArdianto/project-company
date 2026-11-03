<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    public const STATUS_APPROVED = 'approved';
    public const STATUS_PENDING  = 'pending';
    public const STATUS_ARCHIVED = 'archived';

    protected $fillable = ['nama', 'status', 'testimoni', 'rating'];
    public $timestamps = true;

    public static function validStatuses(): array
    {
        return [
            self::STATUS_APPROVED,
            self::STATUS_PENDING,
            self::STATUS_ARCHIVED,
        ];
    }
}
