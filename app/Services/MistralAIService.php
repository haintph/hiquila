<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MistralAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MISTRAL_API_KEY'); // Lấy API key từ .env
    }

    public function chat($message)
    {
        try {
            $response = $this->client->post('https://api.mistral.ai/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'mistral-medium', // Hoặc mistral-tiny, mistral-large
                    'messages' => [
                        ['role' => 'system', 'content' => 'Bạn là trợ lý AI.'],
                        ['role' => 'user', 'content' => $message],
                    ],
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'Lỗi khi gọi API: ' . $e->getMessage()];
        }
    }
}
