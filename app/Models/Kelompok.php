<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';

    protected $fillable = [
        'nama_kelompok', 
        'mentor_id'
    ];

    public function mentor(){
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function mentee(){
        return $this->hasMany(Mentee::class, 'kelompok_id');
    }

    public function presensi(){
        return $this->hasMany(Presensi::class, 'kelompok_id');
    }
}
