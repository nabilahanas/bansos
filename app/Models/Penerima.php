<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $table = 'penerima';

    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'foto_ktp',
        'foto_kk',
        'usia',
        'gender',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat',
        'rt',
        'rw',
        'penghasilan_sebelum',
        'penghasilan_sesudah',
        'alasan',
    ];
}
