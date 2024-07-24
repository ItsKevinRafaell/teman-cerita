<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
       public function createNewConversation()
    {
        $conversation = new Conversation();
        $conversation->user_id = auth()->user()->id;
        $conversation->last_activity_at = now();
        $conversation->save();

        $path = storage_path("app/chat_context_{$conversation->id}_{$conversation->user->id}_{$conversation->user->name}.json");
        $conversation->update(['file_path' => $path]);

        return $conversation;
    }

    public function createJsonFile($conversation)
    {
        $path = storage_path("app/chat_context_{$conversation->id}_{$conversation->user->id}_{$conversation->user->name}.json");
        file_put_contents($path, json_encode([], JSON_PRETTY_PRINT));
    }

    public function getConversationContent()
    {
        $conversation = Conversation::where('user_id', auth()->user()->id)->first();

        if (!$conversation) {
            $conversation = $this->createNewConversation();
        }

        $path = storage_path("app/chat_context_{$conversation->id}_{$conversation->user->id}_{$conversation->user->name}.json");

        if (!file_exists($path)) {
            $this->createJsonFile($conversation);
        }

        $context = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        return response()->json([
            'context' => $context
        ]);
    } 

    function dashboard() {
        return view('dashboard');
    }
}
