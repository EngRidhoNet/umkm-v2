<?php

namespace App\Http\Controllers;
use App\Models\chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'id_receiver' => 'required|exists:users,id',
            'pesan' => 'required|string',
        ]);

        Chat::create([
            'id_sender' => auth()->user()->id,
            'id_receiver' => $request->receiver_id,
            'pesan' => $request->pesan,
            'tanggal' => now(),
            'is_read' => false,
        ]);

        return response()->json(['success' => 'Message sent successfully!']);
    }

    public function getMessages($receiverId)
    {
        $messages = Chat::where(function ($query) use ($receiverId) {
            $query->where('id_sender', auth()->id())
                ->where('id_receiver', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('id_sender', $receiverId)
                ->where('id_receiver', auth()->id());
        })->orderBy('tanggal', 'asc')->get();

        return response()->json($messages);
    }


}
