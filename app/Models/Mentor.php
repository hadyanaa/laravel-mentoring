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
        'user_id'
    ];
}
