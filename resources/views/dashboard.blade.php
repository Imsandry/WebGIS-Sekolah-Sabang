@extends('layouts.app') {{-- Menggunakan master layout app.blade.php --}}

@section('header') {{-- Mengisi slot header --}}
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content') {{-- Mengisi section 'content' --}}
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">




            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-green-500 dark:text-green-400">
                        <i class="fas fa-book-reader fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Sekolah Dasar (SD)</h3>
                        <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-300">
                            {{ \App\Models\Sekolah::where('jenjang', 'SD')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-green-500 dark:text-green-400">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Sekolah Menengah Pertama (SMP)</h3>
                        <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-300">
                            {{ \App\Models\Sekolah::where('jenjang', 'SMP')->count() }}
                        </p>
                    </div>
                </div>
            </div>

             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-green-500 dark:text-green-400">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Sekolah Menengah Atas (SMA)</h3>
                        <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-300">
                            {{ \App\Models\Sekolah::where('jenjang', 'SMA')->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-red-500 dark:text-red-400">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Total Sekolah</h3>
                        <p class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-300">
                            {{ \App\Models\Sekolah::count() }}
                        </p>
                    </div>
                </div>
            </div>

             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6 flex flex-col items-center justify-center text-center">
                <div class="flex-shrink-0 text-red-500 dark:text-red-400 mb-3">
                    <i class="fas fa-map-marked-alt fa-3x"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Lihat Peta Persebaran</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Akses peta interaktif lokasi sekolah.</p>
                <a href="{{ route('map.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-external-link-alt mr-2"></i> Buka Peta
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6 flex flex-col items-center justify-center text-center">
                <div class="flex-shrink-0 text-red-500 dark:text-red-400 mb-3">
                    <i class="fas fa-edit fa-3x"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Manajemen Data Sekolah</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Tambah, edit, dan hapus data sekolah.</p>
                <a href="{{ route('sekolah.manage') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-cog mr-2"></i> Kelola Data
                </a>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Ringkasan Statistik & Grafik</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 flex items-center justify-center">
                    <canvas id="jenjangChart" class="max-h-80"></canvas>
                </div>
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 flex items-center justify-center">
                    <canvas id="akreditasiChart" class="max-h-80"></canvas>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Selamat datang kembali di dashboard WebGIS Pendidikan Anda!") }}
            </div>
        </div>
    </div>
</div>

@php
    // Ambil data untuk grafik
    $jenjangData = \App\Models\Sekolah::select('jenjang', \DB::raw('count(*) as total'))
                                    ->groupBy('jenjang')
                                    ->pluck('total', 'jenjang')
                                    ->toArray();

    $akreditasiData = \App\Models\Sekolah::select('akreditasi', \DB::raw('count(*) as total'))
                                        ->groupBy('akreditasi')
                                        ->pluck('total', 'akreditasi')
                                        ->toArray();

    // Siapkan data untuk Chart.js (label dan nilai)
    $jenjangLabels = json_encode(array_keys($jenjangData));
    $jenjangValues = json_encode(array_values($jenjangData));

    $akreditasiLabels = json_encode(array_keys($akreditasiData));
    $akreditasiValues = json_encode(array_values($akreditasiData));
@endphp

@push('scripts')
    {{-- Pastikan Chart.js dimuat di sini --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk Chart Jenjang
            const jenjangLabels = {!! $jenjangLabels !!};
            const jenjangValues = {!! $jenjangValues !!};

            const jenjangCtx = document.getElementById('jenjangChart').getContext('2d');
            new Chart(jenjangCtx, {
                type: 'pie', // Atau 'bar'
                data: {
                    labels: jenjangLabels,
                    datasets: [{
                        label: 'Distribusi Jenjang',
                        data: jenjangValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)', // Merah
                            'rgba(54, 162, 235, 0.7)', // Biru
                            'rgba(255, 206, 86, 0.7)', // Kuning
                            'rgba(75, 192, 192, 0.7)', // Hijau
                            'rgba(153, 102, 255, 0.7)', // Ungu
                            'rgba(255, 159, 64, 0.7)'  // Oranye
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribusi Sekolah Berdasarkan Jenjang',
                            color: 'rgb(107, 114, 128)' // Tailwind gray-500
                        },
                        legend: {
                            labels: {
                                color: 'rgb(107, 114, 128)' // Tailwind gray-500
                            }
                        }
                    }
                }
            });

            // Data untuk Chart Akreditasi
            const akreditasiLabels = {!! $akreditasiLabels !!};
            const akreditasiValues = {!! $akreditasiValues !!};

            const akreditasiCtx = document.getElementById('akreditasiChart').getContext('2d');
            new Chart(akreditasiCtx, {
                type: 'bar', // Atau 'pie'
                data: {
                    labels: akreditasiLabels,
                    datasets: [{
                        label: 'Distribusi Akreditasi',
                        data: akreditasiValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'rgb(107, 114, 128)' // Tailwind gray-500
                            }
                        },
                        x: {
                            ticks: {
                                color: 'rgb(107, 114, 128)' // Tailwind gray-500
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribusi Sekolah Berdasarkan Akreditasi',
                            color: 'rgb(107, 114, 128)' // Tailwind gray-500
                        },
                        legend: {
                            display: false // Biasanya tidak perlu legend untuk bar chart tunggal
                        }
                    }
                }
            });
        });
    </script>
@endpush
@endsection
