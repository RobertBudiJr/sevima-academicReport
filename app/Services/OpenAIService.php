<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $openai;

    public function __construct()
    {
        $this->openai = new OpenAI([
            'apiKey' => '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',
        ]);
    }

    public function generateArticle($title)
    {
        $prompt = "Title: $title\n\nContent:";
        $response = $this->openai->completions([
            'model' => 'text-davinci-003', // Choose the appropriate model for your use case
            'prompt' => $prompt,
            'max_tokens' => 200, // Adjust the value based on your desired article length
        ]);

        dd($response); // Add this line to inspect the response

        return $response['choices'][0]['text'];
    }
}