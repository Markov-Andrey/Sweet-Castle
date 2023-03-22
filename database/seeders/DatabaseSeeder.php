<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Product;
use App\Models\Status;
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
        $dataStatus = [
            ['id' => 1,'status_name' => "Not viewed"],
            ['id' => 2,'status_name' => "Viewed"],
            ['id' => 3,'status_name' => "In work"],
            ['id' => 4,'status_name' => "Delivery"],
            ['id' => 5,'status_name' => "Ready"],
            ['id' => 6,'status_name' => "Closed"],
            ['id' => 7,'status_name' => "Cancel"],
        ];
        foreach ($dataStatus as $item){
            Status::factory()->create($item);
        }
    }
}
