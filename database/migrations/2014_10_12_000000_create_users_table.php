<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('nik')->unique(); // Tambahkan ini
        $table->string('no_telp')->nullable(); // Tambahkan ini
        $table->string('rt_rw')->nullable(); // Tambahkan ini
        $table->string('password');
        $table->string('role')->default('user'); // Tambahkan ini
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
