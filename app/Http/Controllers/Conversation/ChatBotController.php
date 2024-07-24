<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\ConversationChat;
use App\Models\RoomChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Orhanerday\OpenAi\OpenAi;

class ChatBotController extends Controller
{  
    protected $conversationController;

    public function __construct(ConversationController $conversationController)
    {
        $this->conversationController = $conversationController;   
    }

     public function getChatResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 422);
        }

        $message = $request->input('message');
        $conversation = Conversation::where('user_id', auth()->user()->id)->first();

        if (!$conversation) {
            $conversation = $this->conversationController->createNewConversation();
        }

        $conversation->update(['last_activity_at' => now(), 'status' => 1,]);

        $path = storage_path("app/chat_context_{$conversation->id}_{$conversation->user->id}_{$conversation->user->name}.json");

        if (!file_exists($path)) {
            $this->conversationController->createJsonFile($conversation);
        }

        $context = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        $rulesMessage = [
            [
                'role' => 'system',
                'content' => "You are an AI who acts as a good listener for the user. Start by acknowledging and validating the user's feelings, and use Indonesian slang. Don't ask too many questions, but when the time is right, ask. Focus on the user's feelings and validate their emotions."
            ]
        ];

        foreach ($context as $item) {
            $rulesMessage[] = [
                'role' => 'user',
                'content' => $item[auth()->user()->name]
            ];
            $rulesMessage[] = [
                'role' => 'assistant',
                'content' => $item['ai']
            ];
        }

        $rulesMessage[] = [
            'role' => 'user',
            'content' => $message
        ];

        $openAiKey = env('OPENAI_API_KEY');
        $openAi = new OpenAi($openAiKey);

        try {
            $result = $openAi->chat([
                "model" => "gpt-3.5-turbo",
                "temperature" => 0.7,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" => 0,
                'max_tokens' => 100,
                'messages' => $rulesMessage,
            ]);

            $resultArray = json_decode($result, true);

            if (isset($resultArray['choices'][0]['message']['content'])) {
                $content = trim($resultArray['choices'][0]['message']['content']);
            } else {
                return response()->json(['error' => 'Failed to get a valid response from AI'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get response from AI', 'message' => $e->getMessage()], 500);
        }

        $context[] = ['user' => $message, 'ai' => $content];
        file_put_contents($path, json_encode($context, JSON_PRETTY_PRINT));

        $conversation->update(['last_activity_at' => now()]);

        return response()->json([
            'message' => $content
        ]);
    }
}
