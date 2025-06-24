<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah; // Pastikan model Sekolah sudah di-import

class MapController extends Controller
{
    /**
     * Menampilkan halaman peta utama.
     */
    public function index()
    {
        return view('map'); // Mengembalikan view 'map.blade.php'
    }

    /**
     * Mengembalikan data sekolah dalam format GeoJSON.
     */
    public function data()
    {
        $sekolah = Sekolah::all(); // Ambil semua data sekolah dari database

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => $sekolah->map(function ($s) {
                return [
                    'type' => 'Feature',
                    'properties' => [
                        'nama' => $s->nama,
                        'jenjang' => $s->jenjang,
                        'akreditasi' => $s->akreditasi,
                        // Pastikan path foto benar dan file ada di public/images/sekolah/
                        'foto' => asset('images/sekolah/' . $s->foto),
                        'npsn' => $s->npsn, // Contoh properti tambahan
                        'alamat' => $s->alamat, // Contoh properti tambahan
                    ],
                    'geometry' => [
                        'type' => 'Point',
                        // Penting: Koordinat GeoJSON adalah [longitude, latitude]
                        'coordinates' => [(float) $s->lng, (float) $s->lat],
                    ],
                ];
            }),
        ];

        return response()->json($geojson);
    }
}
