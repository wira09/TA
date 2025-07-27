<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_kuesioner extends Model
{
    /** @use HasFactory<\Database\Factories\UserKuesionerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kusioner_id',
        'status',
    ];

    // di model user_kuesioner.php
    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class);
    }
}
