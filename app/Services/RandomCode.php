<?php


namespace App\Services;


class RandomCode
{

    /**
     * Alphanumeric code generator of given size
     *
     * @param $count - string size
     * @return string
     */
    public static function generate($count)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $random_string = '';
        $input_length = strlen($chars);

        for($i = 0; $i < $count; $i++){
            $random_character = $chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
