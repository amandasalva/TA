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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kelas_id');
            $table->foreignId('semester_id');
            $table->string('NIS');
            $table->string('nama_lengkap');
            $table->string('nama_wali');
            $table->string('no_hp');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('thn_masuk');
            $table->enum('status', ['aktif', 'non-aktif']);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};