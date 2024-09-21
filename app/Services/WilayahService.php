<?php

namespace App\Services;

use GuzzleHttp\Client;

class WilayahService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getProvinsi()
    {
        $response = $this->client->get("https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json");
        return json_decode($response->getBody(), true);
    }

    public function getKota($provinceId)
    {
        $response = $this->client->get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        $kotaData = json_decode($response->getBody(), true);

        // Filter kota berdasarkan id provinsi
        return array_filter($kotaData, function ($kota) use ($provinceId) {
            return $kota['province_id'] == $provinceId;
        });
    }

    public function getKecamatan($regencyId)
    {
        $response = $this->client->get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$regencyId}.json");
        $kecamatanData = json_decode($response->getBody(), true);

        // Filter kecamatan berdasarkan id kota
        return array_filter($kecamatanData, function ($kecamatan) use ($regencyId) {
            return $kecamatan['regency_id'] == $regencyId;
        });
    }

    public function getKelurahan($districtId)
    {
        $response = $this->client->get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$districtId}.json");
        $kelurahanData = json_decode($response->getBody(), true);

        // Filter kelurahan berdasarkan id kecamatan
        return array_filter($kelurahanData, function ($kelurahan) use ($districtId) {
            return $kelurahan['district_id'] == $districtId;
        });
    }
}
