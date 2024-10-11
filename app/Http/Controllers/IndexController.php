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
        $umkm = umkm::inRandomOrder()->take(3)->get(); // Get 3 random UMKM entries
        $artikel = artikel::inRandomOrder()->take(3)->get(); // Get 3 random artikel entries

        return view('index', compact('umkm', 'artikel'));
    }

    public function getDataEvent()
    {
        $artikel = artikel::all();
        return view('event', compact('artikel'));
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
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial', 'Lainnya'];

        $projects = pekerjaan::all()->groupBy('kategori');
        // dd($projects);

        return view('mahasiswa.list_project', compact('categories', 'projects'));
    }

    // Fetch specific project details
    public function showProject($id)
    {
        $project = pekerjaan::with('user')->findOrFail($id); // Eager load user with the project
        return view('mahasiswa.show_project', compact('project'));
    }
}
