<?php

namespace App\Jobs;

use App\Mail\Telegram\OrderNotificationTelegram;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class TelegramOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $token;
    protected $chat;
    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($token, $chat, $data)
    {
        $this->token = $token;
        $this->chat = $chat;
        $this->order = OrderNotificationTelegram::build($data);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Http::post('https://api.telegram.org/bot'.$this->token.'/sendMessage', [
            'chat_id' => $this->chat,
            'text' => $this->order,
            'parse_mode' => 'HTML'
        ]);
    }
}
