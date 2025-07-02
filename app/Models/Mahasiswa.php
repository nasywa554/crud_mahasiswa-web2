<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Kolom-kolom yang diperbolehkan untuk pengisian massal (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'email',
        'status',
    ];

}