<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('umkm.konsultasi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_aktivitas_bisnis' => 'required',
            'nama_pelaku_bisnis' => 'required',
            'tipe_identitas' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'detail_kendala_bisnis' => 'required',
            'kendala_bisnis' => 'required',
            'kategori_kebutuhan' => 'required',
            'deskripsi_masalah' => 'required',
        ]);

        $konsultasi = new Konsultasi();
        $konsultasi->id_user = auth()->user()->id;
        $konsultasi->status_aktivitas_bisnis = $request->status_aktivitas_bisnis;
        $konsultasi->nama_pelaku_bisnis = $request->nama_pelaku_bisnis;
        $konsultasi->tipe_identitas = $request->tipe_identitas;
        $konsultasi->email = $request->email;
        $konsultasi->alamat = $request->alamat;
        $konsultasi->provinsi = $request->provinsi;
        $konsultasi->kota = $request->kota;
        $konsultasi->detail_kendala_bisnis = $request->detail_kendala_bisnis;
        $konsultasi->kendala_bisnis = $request->kendala_bisnis;
        $konsultasi->kategori_kebutuhan = $request->kategori_kebutuhan;
        $konsultasi->deskripsi_masalah = $request->deskripsi_masalah;
        $konsultasi->save();

        return redirect()->route('umkm.konsultasi.index')->with('success', 'Konsultasi berhasil disimpan.');
    }

    
}
