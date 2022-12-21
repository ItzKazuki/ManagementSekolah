<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('keanggotaan')->default('menunggu_persetujuan'); // ada 4 menunggu_persetujuan, anggota, bendahara, serketaris, wakil & ketua
            $table->boolean('isAdmin')->default(false); //cuma cek ini admin bukan, buat akses semua permission di web
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
