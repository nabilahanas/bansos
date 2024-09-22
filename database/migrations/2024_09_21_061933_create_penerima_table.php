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
        Schema::create('penerima', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->integer('usia');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->integer('penghasilan_sebelum');
            $table->integer('penghasilan_sesudah');
            $table->enum('alasan', ['Kehilangan pekerjaan', 'Kepala keluarga', 'Fakir/miskin', 'Lainnya']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima');
    }
};
