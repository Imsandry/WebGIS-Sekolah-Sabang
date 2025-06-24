<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang'); // SD, SMP, SMA
            $table->string('akreditasi')->nullable(); // A, B, C, etc.
            $table->text('alamat')->nullable();
            $table->double('lat', 10, 7); // Latitude
            $table->double('lng', 10, 7); // Longitude
            $table->string('foto')->nullable(); // Nama file foto
            $table->string('npsn')->unique()->nullable(); // Nomor Pokok Sekolah Nasional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
