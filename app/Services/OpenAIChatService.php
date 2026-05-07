<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIChatService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY'); // Store your API key in the .env file
    }

    public function getChatResponse($userInput)
    {
        $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-4', // Use the desired GPT model
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $userInput],
                ],
                'max_tokens' => 150,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
