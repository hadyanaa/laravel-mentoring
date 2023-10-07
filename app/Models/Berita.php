<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul', 
        'sumber',
        'konten_berita'
    ];

    public function berita(){
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
