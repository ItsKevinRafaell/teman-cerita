<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Orhanerday\OpenAi\OpenAi;

class ChatBotController extends Controller
{
    public function getChatResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'room_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid input',
                'messages' => $validator->errors()
            ], 422);
        }

        $message = $request->input('message');
        $roomId = $request->input('room_id');

        // Path to JSON file for the chat room
        $path = storage_path("app/chat_context_{$roomId}.json");

        if (!file_exists($path)) {
            return response()->json(['error' => 'Chat room not found'], 404);
        }

        // Retrieve conversation context from the JSON file
        $context = json_decode(file_get_contents($path), true);

        $rulesMessage = [
            [
                'role' => 'system',
                'content' => "You are an AI therapist. Start by acknowledging the user's emotional state and then ask questions. You will be responding to the user in Indonesian and use Indonesian slang. The user's emotion is. If need information, you can ask with question format of Generalized Anxiety Disorder 7 (GAD-7), Patient Health Questionnaire (PHQ-9). Only give response with Indonesian slang."
            ]
        ];

        // Add previous context messages
        foreach ($context as $item) {
            $rulesMessage[] = [
                'role' => 'user',
                'content' => $item['user']
            ];
            $rulesMessage[] = [
                'role' => 'assistant',
                'content' => $item['ai']
            ];
        }

        // Add the current user message
        $rulesMessage[] = [
            'role' => 'user',
            'content' => $message
        ];

        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        try {
            $result = $open_ai->chat([
                "model" => "gpt-3.5-turbo",
                "temperature" => 0.7,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" => 0,
                'max_tokens' => 600,
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
        $context[] = ['user' => $message, 'ai' => $result];
        file_put_contents($path, json_encode($context, JSON_PRETTY_PRINT));

        return response()->json([
            'message' => $content
        ]);
    }
}
