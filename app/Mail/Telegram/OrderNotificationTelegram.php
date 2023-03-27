<?php


namespace App\Mail\Telegram;

use App\Models\User;
use App\Models\Product;

class OrderNotificationTelegram
{

    public static function build($data): string
    {
        $user = User::find($data[0]->user_id);

        $sum = 0;

        $message = OrderNotificationTelegram::title($data[0]->order);
        $message .= OrderNotificationTelegram::from($user);

        $message .= "🍰 <b>List:</b>\n";

        foreach($data as $item){
            $product = Product::find($item->product_id);

            $message .= " - ".$product->title." - ";
            $message .= $item->quantity."\n";

            $sum += $product->price * $item->quantity;
        }

        $sum = number_format($sum, 2);

        $message .= "💰 <u><b>Total: {$sum}\$</b></u>";

        return $message;
    }

    public static function title($title): string
    {

        return "✅ <b>New order \n🆔 {$title}</b>\n";
    }

    public static function from($user): string
    {
        return "🙍‍♂ <b>From:</b> {$user->name}\n📫<b>Contact:</b> {$user->email}\n";
    }
}
