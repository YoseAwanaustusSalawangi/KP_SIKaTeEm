<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $fillable = ['nim', 'namaMhs', 'prodi', 'status', 'dokumen', 'foto'];
}
