# 🎓🌐 WebGIS Pendidikan Sabang

---

## 📖 Latar Belakang  
WebGIS Pendidikan Sabang hadir untuk mempermudah pemantauan dan manajemen data sekolah di Kota Sabang melalui peta interaktif. Dengan tampilan visual yang jelas seperti pada gambar, pengguna dapat melihat sebaran lokasi SD, SMP, dan SMA serta informasi akreditasi secara langsung di browser. Hal ini mendukung perencanaan program pendidikan dan evaluasi infrastruktur sekolah secara real time. 🏫🗺️✨

---

## ⚙️ Fitur Utama  

1. 🗺️ **Peta Persebaran Sekolah**  
   - Menampilkan titik-titik lokasi sekolah dasar (SD), sekolah menengah pertama (SMP), dan sekolah menengah atas (SMA) di Pulau Weh.  
   - Zoom & pan interaktif untuk eksplorasi wilayah.  

2. ➕ **Tambah Data Sekolah**  
   - Form input data baru: nama sekolah, alamat, jenjang, akreditasi, dan koordinat GPS.  
   - Validasi input otomatis untuk memastikan kualitas data.  

3. ✏️ **Edit & Hapus Data**  
   - Ubah informasi sekolah langsung dari tabel atau pop-up modal.  
   - Konfirmasi penghapusan data agar tidak terjadi kesalahan.  

4. 📊 **Ringkasan Statistik & Grafik**  
   - Diagram pie dan bar untuk distribusi jenjang dan akreditasi sekolah.  
   - Dashboard real-time dengan update jumlah total sekolah.  

---

## 🛠️ Teknologi yang Digunakan  

| Komponen                 | Teknologi / Library          |
|--------------------------|------------------------------|
| Backend                  | Laravel 11 (PHP 8.2) 🐘       |
| Database                 | PostgreSQL / MySQL 🗄️        |
| Frontend                 | Vue.js / Blade Templates 🖥️  |
| Peta Interaktif          | Leaflet.js 🌍 / Mapbox GL    |
| Chart & Grafik           | Chart.js 📈                  |
| Autentikasi & Autorisasi | Laravel Breeze / Sanctum 🔒  |
| Styling                  | Tailwind CSS 🎨             |

---

## 🚀 Cara Instalasi  

1. **Clone Repository**  
   ```bash
   git clone https://github.com/username/webgis-pendidikan-sabang.git
   cd webgis-pendidikan-sabang


2. Install Dependencies
bash
Copy
Edit
composer install      # Backend  
npm install           # Frontend  

3. Konfigurasi Environment

Copy file .env.example menjadi .env

Atur DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

Atur MAPBOX_TOKEN atau API key Leaflet jika diperlukan

4. Generate Application Key & Migrasi Database

bash
Copy
Edit
php artisan key:generate
php artisan migrate --seed

5.Build Assets & Jalankan Server

bash
Copy
Edit
npm run build
php artisan serve --host=0.0.0.0 --port=8000

6. Akses di: http://localhost:8000 🚀🌟 
