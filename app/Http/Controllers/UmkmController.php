<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\umkm;
use App\Models\artikel;
use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    // Menampilkan data UMKM
    public function index()
    {
        // Mendapatkan id user yang sedang login
        $userId = Auth::id();

        // Mengambil data UMKM berdasarkan id user yang login
        $umkm = umkm::where('id_user', $userId)->first();

        return view('umkm.index', compact('umkm'));
    }

    // Menampilkan data artikel
    public function indexArtikel()
    {
        $artikel = artikel::all();
        return view('umkm.artikel.index', compact('artikel'));
    }

    // Menampilkan data pekerjaan
    public function indexPekerjaan()
    {
        $pekerjaan = pekerjaan::all();
        return view('umkm.pekerjaan.index', compact('pekerjaan'));
    }

    // Method show untuk menampilkan detail UMKM
    public function showUmkm($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        return view('umkm.show', compact('umkm'));
    }

    // Method untuk mengedit data UMKM
    public function editUmkm($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        return view('umkm.edit', compact('umkm'));
    }

    // Method untuk update data UMKM
    public function updateUmkm(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kategori' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'informasi_pemilik' => 'required|string',
            'informasi_bisnis' => 'required|string',
        ]);

        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        // Mengupdate data UMKM
        $umkm->update($request->all());

        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diperbarui');
    }

    // Method untuk menampilkan form create artikel
    public function createArtikel()
    {
        return view('umkm.artikel.create');
    }

    // Method untuk menyimpan data artikel baru
    public function storeArtikel(Request $request)
    {
        // dd($request);
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Buat array untuk menyimpan data artikel
        $data = $request->only(['judul', 'deskripsi', 'tanggal']);

        // Menyimpan id_user dari user yang sedang login
        $data['id_user'] = auth()->user()->id;

        // Cek apakah gambar diupload
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke folder 'public/uploads/artikel'
            $path = $request->file('gambar')->store('uploads/artikel', 'public');

            // Tambahkan path gambar ke dalam data artikel
            $data['gambar'] = $path;
        }

        // Simpan artikel ke database
        artikel::create($data);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil dibuat');
    }



    // Method untuk menampilkan detail artikel
    public function showArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('umkm.artikel.show', compact('artikel'));
    }

    // Method untuk menampilkan form edit artikel
    public function editArtikel($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('umkm.artikel.edit', compact('artikel'));
    }

    // Method untuk mengupdate artikel
    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $artikel = artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }

    // Method untuk menghapus artikel
    public function destroyArtikel($id)
    {
        $artikel = artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('umkm.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }

    // Method untuk menampilkan form create pekerjaan
    public function createPekerjaan()
    {
        return view('umkm.pekerjaan.create');
    }

    // Method untuk menyimpan data pekerjaan baru
    public function storePekerjaan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        pekerjaan::create($request->all());

        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Pekerjaan berhasil dibuat');
    }

    // Method untuk menampilkan detail pekerjaan
    public function showPekerjaan($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);

        return view('umkm.pekerjaan.show', compact('pekerjaan'));
    }

    // Method untuk menampilkan form edit pekerjaan
    public function editPekerjaan($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);

        return view('umkm.pekerjaan.edit', compact('pekerjaan'));
    }

    // Method untuk mengupdate pekerjaan
    public function updatePekerjaan(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $pekerjaan = pekerjaan::findOrFail($id);
        $pekerjaan->update($request->all());

        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Pekerjaan berhasil diperbarui');
    }

    // Method untuk menghapus pekerjaan
    public function destroyPekerjaan($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Pekerjaan berhasil dihapus');
    }
}
