<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'mentee_id', 
        'presensi_id',
        'status'
    ];

    public function mentee(){
        return $this->belongsTo(Mentee::class);
    }

    public function presensi(){
        return $this->belongsTo(Presensi::class);
    }
}
