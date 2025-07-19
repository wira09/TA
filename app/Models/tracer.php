<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracer extends Model
{
    /** @use HasFactory<\Database\Factories\TracerFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'mulai_kerja',
        'nama_instansi',
        'jabatan',
        'kesesuaian_kerja',
        'kelurahan',
        'kab_kota',
        'provinsi',
        'kode_pos',
        'tgl_update',
    ];

    protected $casts = [
        'mulai_kerja' => 'date',
        'tgl_update' => 'date',
    ];

    /**
     * Get the alumni that owns the tracer.
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
