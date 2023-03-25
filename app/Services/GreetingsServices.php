<?php


namespace App\Services;

class GreetingsServices
{
    /**
     * Get a greeting depending on the time of day
     * @return string - greetings
     */
    public static function handle(): string
    {
        $now = date('H:i');

        if($now >= '06:00' && $now < '12:00'){
            $greetings = 'Good morning';
        } elseif ($now >= '12:00' && $now < '18:00') {
            $greetings = 'Good afternoon';
        } else {
            $greetings = 'Good evening';
        }

        return $greetings;
    }

}
