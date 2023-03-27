<?php

namespace App\Actions;

use App\Jobs\TelegramOrderJob;
use Illuminate\Support\Facades\Config;

class OrderTelegramAction
{
    private array $data = [];

    /**
     * Add products to array
     */
    public function add($item)
    {
        array_push($this->data, $item);
    }

    /**
     * Send order to processor
     */
    public function send()
    {
        $token = Config::get('telegram.token');
        $chat = Config::get('telegram.chat_id');

        TelegramOrderJob::dispatch($token, $chat, $this->data);

        $this->data = []; //null data
    }
}
