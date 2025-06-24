<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sekolah; // Import model Sekolah

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
            'nama' => 'SDN 1 Sabang',
            'jenjang' => 'SD',
            'akreditasi' => 'A',
            'alamat' => 'Jl. Percontohan No. 1, Sabang',
            'lat' => 5.8920,
            'lng' => 95.3165,
            'foto' => 'sdn_sabang_1.jpg', // Pastikan file ini ada di public/images/sekolah/
            'npsn' => '10101001',
        ]);

        Sekolah::create([
            'nama' => 'SMPN 2 Sabang',
            'jenjang' => 'SMP',
            'akreditasi' => 'B',
            'alamat' => 'Jl. Pendidikan No. 5, Sabang',
            'lat' => 5.8850,
            'lng' => 95.3200,
            'foto' => 'smpn_sabang_2.jpg',
            'npsn' => '10101002',
        ]);

        Sekolah::create([
            'nama' => 'SMAN 3 Sabang',
            'jenjang' => 'SMA',
            'akreditasi' => 'A',
            'alamat' => 'Jl. Utama No. 10, Sabang',
            'lat' => 5.8950,
            'lng' => 95.3100,
            'foto' => 'sman_sabang_3.jpg',
            'npsn' => '10101003',
        ]);
        // Tambahkan lebih banyak data dummy sesuai kebutuhan
    }
}
