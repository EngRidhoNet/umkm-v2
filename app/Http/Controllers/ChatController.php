<?php

namespace App\Http\Controllers;
use App\Models\chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chat = chat::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data chat',
            'data'    => $chat
        ], 200);
    }

    public function show($id)
    {
        $chat = chat::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data chat',
            'data'    => $chat
        ], 200);
    }

    public function store(Request $request)
    {
        $chat = chat::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_umkm' => $request->id_umkm,
            'pesan' => $request->pesan,
            'tanggal' => $request->tanggal,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data chat berhasil disimpan',
            'data'    => $chat
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $chat = chat::findOrfail($id);
        $chat->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data chat berhasil diupdate',
            'data'    => $chat
        ], 200);
    }

    public function destroy($id)
    {
        $chat = chat::findOrfail($id);

        if($chat){
            $chat->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data chat berhasil dihapus',
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data chat tidak ditemukan',
            ], 404);
        }
    }
}
