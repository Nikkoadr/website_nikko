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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama', 50);
            $table->enum('jk', ['L', 'P']);
            $table->enum('prodi', ['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Mesin', 'Akutansi']);
            $table->year('angkatan');
            $table->boolean('nonreg')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
