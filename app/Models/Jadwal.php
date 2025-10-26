<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'guru_id',
        'ruangan_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mapel',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
