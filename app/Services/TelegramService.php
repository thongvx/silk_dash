<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramService
{
    private $client;
    private $telegram_bot_token;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.telegram.org']);
        $this->telegram_bot_token = config('app.telegram_bot_token');
    }

    public function send($text)
    {
        $response = $this->client->post("/bot{$this->telegram_bot_token}/sendMessage", [
            'form_params' => [
                'chat_id' => '-1002242992835',
                'text' => $text,
            ]
        ]);

        return $response->getBody();
    }
}
