<?php


namespace App\Mail\Telegram;

use App\Models\User;
use App\Models\Product;
use App\Services\EmojiServices as Emoji;

/**
 * Building a message for telegram
 * @package App\Mail\Telegram
 */
class OrderNotificationTelegram
{
    /**
     * @var float|int Order price
     */
    public static float|int $sum = 0;

    /**
     * Message constructor using facade pattern
     * @param $data
     * @return string
     */
    public static function build($data): string
    {
        $user = User::find($data[0]->user_id);

        $message = self::title();
        $message .= self::numOrder($data[0]->order);
        $message .= self::from($user);
        $message .= self::contacts($user);
        $message .= self::list();
        $message .= self::productList($data);
        $message .= self::total();

        return $message;
    }

    public static function title(): string
    {

        return Emoji::CHECK."<b>New order\n";
    }

    public static function numOrder($code): string
    {

        return Emoji::ID."{$code}</b>\n";
    }

    public static function from($user): string
    {
        return Emoji::MAN."<b>From:</b> {$user->name}\n";
    }

    public static function contacts($user): string
    {
        return Emoji::EMAIL."<b>Contact:</b> {$user->email}\n";
    }

    public static function list(): string
    {
        return Emoji::CAKE."<b>List:</b>\n";
    }

    public static function productList($data): string
    {
        self::$sum = 0;
        $text = '';

        foreach($data as $item){
            $text = '';

            $product = Product::find($item->product_id);

            $text .= " - ".$product->title." - ";
            $text .= $item->quantity."\n";

            self::$sum += $product->price * $item->quantity;
        }

        self::$sum = number_format(self::$sum, 2);

        return $text;
    }

    public static function total(): string
    {
        return Emoji::MONEY."<u><b>Total: ".self::$sum."\$</b></u>";
    }
}
