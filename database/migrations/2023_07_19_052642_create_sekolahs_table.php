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
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->longText('informasi_sekolah');
            $table->string('image');
            $table->string('alamat_sekolah');
            $table->string('email_sekolah');
            $table->string('telepon_sekolah');
            $table->string('facebook_sekolah');
            $table->string('instagram_sekolah');
            $table->string('jam_kerja_sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};