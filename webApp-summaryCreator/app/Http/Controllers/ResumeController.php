<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;


class ResumeController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function generate(Request $request): \Illuminate\Http\JsonResponse
    {
        $client = new Client();
        $apiKey = env('OPENAI_API_KEY'); // Убедитесь, что у вас есть ключ в .env

        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'user', 'content' => 'Сгенерируй резюме по следующим параметрам: ' . $request->input('parameters')]
                ],
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        return response()->json(['resume' => $data['choices'][0]['message']['content']]);
    }
}
