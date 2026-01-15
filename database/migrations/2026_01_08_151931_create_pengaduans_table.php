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
public function up(): void
{
    // Gunakan Schema::create untuk membuat tabel baru
    Schema::create('pengaduans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained(); // Ini kolom yang tadinya hilang
        $table->text('isi_laporan');
        $table->string('foto')->nullable();
        $table->string('status')->default('proses'); // Tambahkan jika dibutuhkan di controller
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pengaduans');
}
};