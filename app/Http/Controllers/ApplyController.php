<?php

namespace App\Http\Controllers;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{

    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan ID project yang dimiliki oleh user
        $projectIds = $user->pekerjaan()->pluck('id'); // Menggunakan relasi pekerjaan

        // Mengambil data apply yang terkait dengan project user
        $applies = apply::whereIn('id_project', $projectIds)
            ->with(['user', 'project']) // Mengambil relasi user dan project
            ->get();

        // Mengembalikan view dengan data applies
        return view('umkm.lamaran.index', compact('applies'));
    }



    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'dokumen' => 'required|mimes:pdf,doc,docx|max:2048',  // Adjust the file type and size if needed
        ]);

        // Handle file upload
        $filePath = $request->file('dokumen')->store('dokumen', 'public');

        // Save the apply record
        Apply::create([
            'id_user' => $request->id_user,
            'id_project' => $request->id_project,  // Assuming you will use this in the migration and Apply model
            'status' => 'pending',
            'dokumen' => $filePath
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:table_apply,id',
            'status' => 'required|in:accepted,rejected',
        ]);

        $apply = apply::findOrFail($request->id);
        $apply->status = $request->status;
        $apply->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'new_status' => ucfirst($apply->status),
        ]);
    }
}
