<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nim')->unique(); // String, unik, tidak boleh null
            $table->string('nama');         // String, tidak boleh null
            // Kolom Jurusan dengan tipe ENUM dan pilihan yang ditentukan
            $table->enum('jurusan', ['Bisnis Digital', 'Teknik Industri', 'Teknik Informatika', 'Manajemen Ritel']);
            $table->string('email')->unique(); // String, unik, valid email format
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif'); // ENUM dengan default 'aktif'
            $table->timestamps();           // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};