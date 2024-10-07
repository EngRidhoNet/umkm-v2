<?php

namespace App\Http\Controllers;

use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekerjaanController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch jobs only for the authenticated user
        $pekerjaan = pekerjaan::where('id_user', Auth::id())->get();
        return view('umkm.pekerjaan.index', compact('pekerjaan'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('umkm.pekerjaan.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat_bekerja' => 'required|string|max:255',
        ]);

        // Create a new job for the authenticated user
        pekerjaan::create([
            'posisi' => $validatedData['posisi'],
            'deskripsi' => $validatedData['deskripsi'],
            'tanggal' => $validatedData['tanggal'],
            'tempat_bekerja' => $validatedData['tempat_bekerja'],
            'id_user' => Auth::id(), // Associate job with the authenticated user
        ]);

        return redirect()->route('umkm.pekerjaan.index')->with('success', 'pekerjaan berhasil ditambahkan');
    }

    // Display the specified resource
    public function show($id)
    {
        $pekerjaan = pekerjaan::find($id); // Manually fetch the pekerjaan
        // dd($pekerjaan); // Dump the pekerjaan data

        return view('umkm.pekerjaan.show', compact('pekerjaan'));
    }


    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        return view('umkm.pekerjaan.edit', compact('pekerjaan'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        $pekerjaan->update($request->all());
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Pekerjaan updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        $pekerjaan->delete();
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Pekerjaan deleted successfully!');
    }
}
