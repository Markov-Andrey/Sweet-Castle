<?php

namespace App\Actions;

use App\Models\User;

class RegisterUserAction
{
    /**
     * Main method
     */
    public function __invoke(array $data)
    {
        return User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => bcrypt($data["password"]),
            ]);
    }
}
