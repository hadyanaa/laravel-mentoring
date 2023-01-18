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
        'no_hp',
        'akun_ig',
        'kelompok_id',
    ];
}
