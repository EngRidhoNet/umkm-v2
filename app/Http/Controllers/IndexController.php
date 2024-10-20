<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\artikel;
use App\Models\mahasiswa;
use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getDataUmkm()
    {
        $pekerjaan = pekerjaan::inRandomOrder()->take(3)->get(); // Get 3 random pekerjaan entries
        $umkm = umkm::inRandomOrder()->take(3)->get(); // Get 3 random UMKM entries
        $artikel = artikel::all(); // Get 3 random artikel entries

        return view('index', compact('umkm', 'artikel','pekerjaan'));
    }



    public function getDataEvent()
    {
        $artikel = artikel::all();
        return view('event', compact('artikel'));
    }

    public function showArtikel($id)
    {
        // Ambil artikel berdasarkan ID
        $artikel = artikel::findOrFail($id);

        // Ambil 5 artikel lainnya yang bukan artikel saat ini
        $relatedArticles = artikel::where('id', '!=', $id)
            ->take(5)
            ->get();

        // Return ke view detail.event dengan data artikel dan artikel terkait
        return view('detail-event', [
            'artikel' => $artikel,
            'relatedArticles' => $relatedArticles,
        ]);
    }


    public function getDataProfilMahasiswa()
    {
        // Get the authenticated user's related mahasiswa data
        $mahasiswa = mahasiswa::where('id_user', Auth::id())->first();
        // dd($mahasiswa);

        // Pass the data to the view
        return view('mahasiswa.profile-mahasiswa', compact('mahasiswa'));
    }

    public function getDataProject()
    {
        $pekerjaan = pekerjaan::all();
        return view('mahasiswa.Project', compact('pekerjaan'));
    }

    public function getDataProjectByCategory($category)
    {
        // Definisikan kategori yang valid
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial','Marketing','Lainnya'];

        // Cek apakah kategori yang dipilih valid
        if (!in_array($category, $categories)) {
            return abort(404, 'Category not found');
        }

        // Ambil data proyek berdasarkan kategori yang dipilih
        $projects = pekerjaan::where('kategori', $category)->get();

        return view('mahasiswa.list_project', compact('category', 'projects'));
    }
    // Fetch specific project details
    public function showProject($id)
    {
        $project = pekerjaan::with('user')->findOrFail($id); // Eager load user with the project
        return view('mahasiswa.show_project', compact('project'));
    }

    public function indexUmkm(Request $request)
    {
        $search = $request->input('search');
        $query = UMKM::query();

        if ($search) {
            $query->where('nama_umkm', 'LIKE', "%{$search}%");
        }

        $umkms = $query->paginate(10);  // 10 items per page

        return view('umkm', compact('umkms', 'search'));
    }

    /**
     * Menampilkan detail UMKM berdasarkan ID
     */
    public function showUmkm($id)
    {
        // Ambil detail UMKM berdasarkan ID
        $umkm = Umkm::findOrFail($id);

        // Kirim data UMKM ke view umkm/show
        return view('showumkm', compact('umkm'));
    }

    public function updateProfile(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);

        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'alamat_mahasiswa' => 'required|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update data mahasiswa
        $mahasiswa->nama_mahasiswa = $request->input('nama_mahasiswa');
        $mahasiswa->universitas = $request->input('universitas');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->no_hp = $request->input('no_hp');
        $mahasiswa->alamat_mahasiswa = $request->input('alamat_mahasiswa');

        // Handle Foto Profil
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('uploads/mahasiswa', 'public');
            $mahasiswa->foto_profil = $path;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.edit-profile', $mahasiswa->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function editProfile($id)
    {
        $mahasiswa = mahasiswa::find($id);

        // Pastikan mahasiswa ditemukan
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.edit-profile', compact('mahasiswa'));
    }


}
