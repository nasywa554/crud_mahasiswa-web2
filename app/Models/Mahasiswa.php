<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'email',
        'status',
    ];

    // Jika nama tabel Anda bukan 'mahasiswas' (plural dari Mahasiswa), Anda bisa menentukannya di sini:
    // protected $table = 'nama_tabel_anda';
}