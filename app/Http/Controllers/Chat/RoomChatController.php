<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\ConversationChat;
use App\Models\RoomChat;

class RoomChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user|admin']);
    }

     public function showRoomChat($roomId) {
        $path = storage_path("app/chat_context_{$roomId}.json");
        $context = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        return response()->json([
            'context' => $context
        ]);
    }

      public function createRoomChat() {
        $roomId = uniqid(); // Mengenerate ID unik untuk room chat
        $userId = auth()->user()->id;

        $path = storage_path("app/chat_context_{$roomId}.json");
        file_put_contents($path, json_encode([]));

        $conversation =  new ConversationChat();
        $conversation->file_path = $path;
        $conversation->save();

        $roomChat = new RoomChat();
        $roomChat->user_id = $userId;
        $roomChat->name = $roomId;
        $roomChat->conversation_id = $conversation->id;
        $roomChat->save();

        // Redirect ke room chat yang baru dibuat
        return response()->json([
            'roomId' => $roomId
        ]);
    }

    function dashboard() {
        return view('dashboard');
    }
}
