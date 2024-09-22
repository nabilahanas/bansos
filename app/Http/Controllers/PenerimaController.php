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

    public function create()
    {
        // Mengambil semua data provinsi
        $provinsi = $this->wilayahService->getProvinsi();
        
        // Kirim data provinsi saja ke view
        return view('create', compact('provinsi'));
    }
    
    // Method untuk mendapatkan data kota berdasarkan id provinsi
    public function getKota($provinceId)
    {
        $kota = $this->wilayahService->getKota($provinceId);
        return response()->json($kota);
    }
    
    // Method untuk mendapatkan data kecamatan berdasarkan id kota
    public function getKecamatan($regencyId)
    {
        $kecamatan = $this->wilayahService->getKecamatan($regencyId);
        return response()->json($kecamatan);
    }

    // Method untuk mendapatkan data kelurahan berdasarkan id kecamatan
    public function getKelurahan($districtId)
    {
        $kelurahan = $this->wilayahService->getKelurahan($districtId);
        return response()->json($kelurahan);
    }
    
    // Menyimpan data penerima
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'no_kk' => 'required|numeric',
            // 'foto_ktp' => 'required|file|mimes:jpg,jpeg,png,bmp|max:2048',
            // 'foto_kk' => 'required|file|mimes:jpg,jpeg,png,bmp|max:2048',
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
            // $ktpPhotoPath = $request->file('foto_ktp')->store('foto_ktps', 'public');
            // $kkPhotoPath = $request->file('foto_kk')->store('foto_kks', 'public');
    
            // Menyimpan data ke database
            $penerima = new Penerima();
            $penerima->nama = $request->nama;
            $penerima->nik = $request->nik;
            $penerima->no_kk = $request->no_kk;
            // $penerima->foto_ktp = $ktpPhotoPath;
            // $penerima->foto_kk = $kkPhotoPath;
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
    
        return redirect()->route('penerima.preview', ['id' => $penerima->id])
                         ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menyimpan data. Silakan coba lagi.']);
        }
    }

    // Menampilkan data penerima
    public function preview($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('preview', compact('penerima'));
    }
}
