<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Tambahkan ini jika tabel di HeidiSQL bernama 'pengaduan' bukan 'pengaduans'
    protected $table = 'pengaduans'; 

    protected $fillable = [
    'user_id',
    'isi_laporan',
    'foto',
    'status'
];

// Tambahkan relasi ke User agar Admin bisa melihat siapa yang melapor
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function tanggapan()
{
    return $this->hasOne(Tanggapan::class);
}
}