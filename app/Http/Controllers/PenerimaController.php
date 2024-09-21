<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;
use App\Services\WilayahService;
use Illuminate\Support\Facades\Storage;

class PenerimaController extends Controller
{
    protected $wilayahService;

    public function __construct(WilayahService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }

    // Show form for inputting recipient data
    public function create()
    {
        $provinsi = $this->wilayahService->getProvinsi();
        $kota = $this->wilayahService->getKota($provinsi[0]['id']);
        $kecamatan = $this->wilayahService->getKecamatan($kota[0]['id']);
        $kelurahan = $this->wilayahService->getKelurahan($kecamatan[0]['id']);    
        return view('create', compact('provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }
    

    // Store the submitted form data
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'no_kk' => 'required|numeric',
            'foto_ktp' => 'file|mimes:jpg,jpeg,png,bmp|max:2048',
            'foto_kk' => 'file|mimes:jpg,jpeg,png,bmp|max:2048',
            'usia' => 'required|numeric|min:25',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'penghasilan_sebelum' => 'required|numeric',
            'penghasilan_sesudah' => 'required|numeric',
            'alasan' => 'required|string',
            'comments' => 'required|accepted',
        ]);
    
        try {
            // // Handle file uploads for KTP and KK
            // $ktpPhotoPath = $request->file('foto_ktp')->store('foto_ktps', 'public');
            // $kkPhotoPath = $request->file('foto_kk')->store('foto_kks', 'public');
    
            // Save the data to the database
            $penerima = new Penerima();
            $penerima->nama = $request->nama;
            $penerima->nik = $request->nik;
            $penerima->no_kk = $request->no_kk;
            $penerima->foto_ktp = $ktpPhotoPath;
            $penerima->foto_kk = $kkPhotoPath;
            $penerima->usia = $request->usia;
            $penerima->gender = $request->gender;
            $penerima->provinsi = $request->provinsi;
            $penerima->kota = $request->kota;
            $penerima->kecamatan = $request->kecamatan;
            $penerima->kelurahan = $request->kelurahan;
            $penerima->alamat = $request->alamat;
            $penerima->rt = $request->rt;
            $penerima->rw = $request->rw;
            $penerima->penghasilan_sebelum = $request->penghasilan_sebelum;
            $penerima->penghasilan_sesudah = $request->penghasilan_sesudah;
            $penerima->alasan = $request->alasan;
            $penerima->save();
    
            // Flash success message
            return redirect()->route('penerima.preview', ['id' => $penerima->id])
                             ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Flash error message
            return back()->withErrors(['error' => 'Gagal menyimpan data. Silakan coba lagi.']);
        }
    }
    

    // Show a preview of the submitted data
    public function preview($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('preview', compact('penerima'));
    }
}
