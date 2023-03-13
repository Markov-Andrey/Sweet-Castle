<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::factory(1)->create([
            "name" => "Andre Markov",
            "email" => "andremarkov@icloud.com",
            "password" => bcrypt("12345"),
        ]);
        Product::factory(10)->create();
        AdminUser::factory(1)->create([
            "name" => "Admin",
            "email" => "sweet-castle@admin.com",
            "password" => bcrypt("12345"),
        ]);
    }
}
