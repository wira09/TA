<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    /** @use HasFactory<\Database\Factories\KusionerFactory> */
    use HasFactory;
    protected $fillable = [
        'soal',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan_e'
    ];

    // di model Kuesioner.php
    public function userKusioners()
    {
        return $this->hasMany(user_kuesioner::class);
    }

    public function jawabans()
    {
        return $this->hasMany(KuesionerJawaban::class);
    }
}
