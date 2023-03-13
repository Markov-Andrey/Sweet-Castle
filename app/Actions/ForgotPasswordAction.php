<?php

namespace App\Actions;

use App\Jobs\ContactFormEmailJob;
use App\Jobs\ForgotUserEmailJob;
use App\Models\User;

class ForgotPasswordAction
{
    /**
     * Main method
     */
    public function __invoke($data)
    {
        $user = User::where([
            "email" => $data["email"]])->first();

        $password = uniqid();
        $user->password = bcrypt($password);
        $user->save();

        ForgotUserEmailJob::dispatch($user, $password);
    }
}
