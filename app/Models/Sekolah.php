<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'sekolah';

    // Kolom-kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'nama',
        'jenjang',
        'akreditasi',
        'alamat',
        'lat',
        'lng',
        'foto',
        'npsn',
        // Tambahkan kolom lain jika ada
    ];

    /**
     * Konversi atribut ke tipe data tertentu.
     * Berguna untuk memastikan lat/lng adalah float.
     */
    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];
}
