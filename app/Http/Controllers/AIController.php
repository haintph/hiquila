<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MistralAIService;

class AIController extends Controller
{
    protected $mistralAI;

    public function __construct(MistralAIService $mistralAI)
    {
        $this->mistralAI = $mistralAI;
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['error' => 'Tin nhắn không được để trống!'], 400);
        }

        try {
            $response = $this->mistralAI->chat($message);
            return response()->json(['response' => $response['choices'][0]['message']['content'] ?? 'Không có phản hồi']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi server: ' . $e->getMessage()], 500);
        }
    }
}
