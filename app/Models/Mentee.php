<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    use HasFactory;

    protected $table = 'mentee';

    protected $fillable = [
        'nama_lengkap', 
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat_asal',
        'alamat_domisili',
        'prodi',
        'angkatan',
        'no_hp',
        'akun_ig',
        'kelompok_id',
    ];

    public function kelompok(){
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }

    public function status(){
        return $this->hasMany(Status::class, 'mentee_id');
    }
}
