<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'info';

    protected $fillable = [
        'judul', 
        'sumber',
        'konten_info'
    ];

    public function info(){
        return $this->belongsTo(Info::class, 'info_id');
    }
}
