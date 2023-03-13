<?php

namespace App\Actions;

use App\Jobs\ContactFormEmailJob;
use Illuminate\Support\Facades\Config;

class ContactEmailAction
{
    /**
     * Main method
     */
    public function __invoke($data)
    {
        $mail = Config::get('mail.myAddress');

        ContactFormEmailJob::dispatch($mail, $data);
    }
}
