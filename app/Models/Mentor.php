<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentor';

    protected $fillable = [
        'nama_mentor', 
        'jenis_kelamin',
        'asal_institusi',
        'prodi',
        'domisili',
        'no_telpon',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelompok(){
        return $this->hasMany(Kelompok::class, 'mentor_id');
    }
}
