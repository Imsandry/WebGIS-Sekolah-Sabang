@extends('layouts.app') {{-- Meng-extend template app.blade.php --}}

@push('styles') {{-- Dorong CSS ini ke bagian head dari app.blade.php --}}
{{-- Leaflet CSS dari CDN --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" /> {{-- UPDATED INTEGRITY --}}

<style>
    /* Reset margin dan padding body untuk memastikan peta full-height */
    body {
        margin: 0;
        padding: 0;
        overflow: hidden; /* Mencegah scroll yang tidak diinginkan saat peta full-height */
    }

    #map {
        /*
         * Tinggi ini perlu diatur dengan hati-hati.
         * Default navbar Laravel Breeze/Jetstream biasanya sekitar 64px.
         * Gunakan Developer Tools (F12) untuk menginspeksi tinggi navbar Anda yang sebenarnya
         * dan sesuaikan nilai '64px' jika berbeda.
         */
        height: calc(100vh - 64px); /* Misalnya, 100% viewport height dikurangi tinggi navbar */
        /* --- UNTUK DEBUGGING CEPAT: Coba ini dulu jika peta tidak muncul sama sekali --- */
        /* height: 700px; */ /* Beri tinggi tetap yang cukup besar */
        /* background-color: #f0f0f0; */ /* Beri warna latar belakang untuk melihat area peta */
        /* ------------------------------------------------------------------------------- */
        width: 100%;
        z-index: 1; /* Pastikan peta di atas elemen lain jika ada */
    }

    /* Gaya kustom untuk ikon sekolah Leaflet */
    .leaflet-div-icon {
      font-size: 1.5rem; /* Ukuran ikon Font Awesome */
      color: #1F2937; /* Warna merah untuk ikon sekolah */
      text-align: center;
      background: none; /* Penting: menghilangkan latar belakang kotak putih */
      border: none; /* Penting: menghilangkan border kotak */
    }

    /* Gaya untuk gambar di popup peta */
    .popup-img {
      margin-top: 5px;
      width: 100%; /* Lebar 100% dari popup */
      max-width: 250px; /* Batasi lebar maksimum */
      border-radius: 5px; /* Sudut membulat */
      box-shadow: 0 2px 6px rgba(0,0,0,0.3); /* Efek bayangan */
      height: auto; /* Mempertahankan rasio aspek gambar */
    }
</style>
@endpush

@section('content') {{-- Konten utama halaman WebGIS akan disuntikkan di sini --}}
    {{-- Elemen div tempat peta akan dirender --}}
    <div id="map"></div>
@endsection

@push('scripts') {{-- Dorong JavaScript ini ke bagian bawah body dari app.blade.php --}}
{{-- Leaflet JS dari CDN --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> {{-- UPDATED INTEGRITY --}}

<script>
    // Pastikan DOM sudah dimuat sepenuhnya sebelum menginisialisasi peta
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta Leaflet
        // setView([latitude, longitude], zoom_level)
        const map = L.map('map').setView([5.889, 95.316], 13); // Koordinat pusat Sabang, Aceh

        // Tambahkan Tile Layer (background peta) dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ambil data GeoJSON dari API Laravel
        fetch('{{ route("map.data") }}')
            .then(response => {
                // Tangani respons jika terjadi error HTTP (misalnya 404, 500)
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.status + ' ' + response.statusText);
                }
                return response.json(); // Parse respons sebagai JSON
            })
            .then(data => {
                console.log('Data fetched for map:', data); // Log data ke konsol browser untuk debugging

                // Pastikan data memiliki properti 'features' dan itu adalah array
                if (data && data.features && Array.isArray(data.features)) {
                    // Tambahkan data GeoJSON ke peta
                    L.geoJSON(data, {
                        pointToLayer: function (feature, latlng) {
                            // Buat marker kustom dengan ikon Font Awesome
                            return L.marker(latlng, {
                                icon: L.divIcon({
                                    className: 'leaflet-div-icon', // Kelas CSS kustom Anda
                                    html: '<i class="fas fa-graduation-cap"></i>', // Ikon sekolah dari Font Awesome
                                    iconSize: [30, 30], // Ukuran ikon
                                    iconAnchor: [15, 15], // Titik jangkar ikon (tengah bawah)
                                })
                            }).bindPopup(`
                                <strong>${feature.properties.nama}</strong><br>
                                Jenjang: ${feature.properties.jenjang}<br>
                                Akreditasi: ${feature.properties.akreditasi}<br>
                                ${feature.properties.foto ? `<img src="${feature.properties.foto}" class="popup-img" alt="Foto ${feature.properties.nama}">` : ''}
                                ${feature.properties.npsn ? `<br>NPSN: ${feature.properties.npsn}` : ''}
                                ${feature.properties.alamat ? `<br>Alamat: ${feature.properties.alamat}` : ''}
                            `);
                        }
                    }).addTo(map);

                    // Opsional: Sesuaikan view peta agar semua marker terlihat
                    if (data.features.length > 0) {
                        // Dapatkan batas (bounds) dari semua fitur GeoJSON
                        const bounds = L.geoJSON(data).getBounds();
                        // Atur peta agar pas di dalam batas tersebut, dengan sedikit padding (0.1)
                        map.fitBounds(bounds.pad(0.1));
                    }

                } else {
                    console.warn("Fetched data does not contain a valid 'features' array for GeoJSON.");
                }
            })
            .catch(error => {
                // Tangani error jika terjadi masalah saat mengambil data
                console.error('Error fetching GeoJSON data:', error);
            });

        // Paksa Leaflet untuk menghitung ulang ukuran peta setelah DOM siap
        // Berguna jika elemen peta awalnya disembunyikan atau ukurannya belum dihitung
        setTimeout(function () {
            map.invalidateSize();
        }, 100); // Penundaan singkat untuk memastikan semua CSS/DOM siap
    });
</script>
@endpush
