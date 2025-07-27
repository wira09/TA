<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawaban extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_jawabans';

    protected $fillable = [
        'user_id',
        'kuesioner_id',
        'jawaban'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class);
    }
}
