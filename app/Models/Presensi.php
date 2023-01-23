<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $fillable = [
        'materi', 
        'tanggal',
        'kelompok_id'
    ];

    public function kelompok(){
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }

    public function status(){
        return $this->hasMany(Status::class, 'presensi_id');
    }
}
