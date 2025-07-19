<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    /** @use HasFactory<\Database\Factories\AlumniFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'no_hp',
        'angkatan',
        'tahun_lulus',
        'program_studi',
        'password',
        'Foto',
        'jenis_kelamin',
        'alamat'
    ];

    /**
     * Get the tracers for the alumni.
     */
    public function tracers()
    {
        return $this->hasMany(tracer::class);
    }
}
