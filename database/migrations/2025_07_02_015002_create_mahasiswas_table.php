<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('nim')->unique(); // NIM, harus unik
            $table->string('nama'); // Nama mahasiswa
            $table->string('jurusan'); // Jurusan
            $table->string('email')->unique(); // Email, harus unik
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif'); // Status, dengan nilai default 'aktif'
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
