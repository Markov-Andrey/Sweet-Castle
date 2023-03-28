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
        //User - Factory
        User::factory(100)->create();
        User::factory(1)->create([
            "name" => "Andre Markov",
            "email" => "andremarkov@icloud.com",
            "password" => bcrypt("12345"),
        ]);

        //Product - Factory
        $dataProduct = [
            ['title' => 'Blueberry',        'thumbnail' => '0a55fae904e3a72a97c3e2b7071939b3.jpg'],
            ['title' => 'Dark Night',       'thumbnail' => '4be73de528589b8cebd5a0984fb7fdc2.jpg'],
            ['title' => 'Rainbow',          'thumbnail' => '5d6e115a033d7c0d45c5e0d4e802c4c3.jpg'],
            ['title' => 'Berry Delight',    'thumbnail' => '7a2c28c58f70b88e6fed0008e0121771.jpg'],
            ['title' => 'Pancake Cake',     'thumbnail' => '49bbc301c5873ef0da4aee7d209ebcb6.jpg'],
            ['title' => 'Graceful Art',     'thumbnail' => '612a6bc58dbe8a1ed987e0769bad23db.jpg'],
            ['title' => 'Velvet',           'thumbnail' => '6764a23712648c4db8370b1c0f18ebee.jpg'],
            ['title' => 'Сhocolate Passion','thumbnail' => '61041cd8c1a8e20f7b3188f0907258b0.jpg'],
            ['title' => 'Rendezvous',       'thumbnail' => '9832740937290872g4gng43ntuj9435gnjt.jpg'],
            ['title' => 'Black Widow',      'thumbnail' => '298307490437504298769084536gdfghf465gfd.jpg'],
            ['title' => 'Emerald Cube',     'thumbnail' => 'ae200114e7c62a5a9c00c9e55fa404fa.jpg'],
            ['title' => 'Golden Pineapple', 'thumbnail' => 'dcd7d39364cbb2066b671aad05fa44f3.jpg'],
            ['title' => 'Oreo',             'thumbnail' => 'ec2e291d539fb08ca84f287dca756493.jpg'],
            ['title' => 'Fruit Paradise',   'thumbnail' => 'fbd78e00afa7bfd0297115551384ba07.jpg'],
            ['title' => 'Milka',            'thumbnail' => 'fd6f968da85506629947b57a9fc457dc.jpg'],
            ['title' => 'Cake Anthill',     'thumbnail' => 'uHJhZbVCztbqhozT8Oy38lanFYQgKzxjaz4sglPZ.jpg'],
        ];
        foreach ($dataProduct as $item){
            Product::factory()->create($item);
        }

        //AdminUser - Factory
        AdminUser::factory(1)->create([
            "name" => "Admin",
            "email" => "sweet-castle@admin.com",
            "password" => bcrypt("12345"),

        ]);

        //Status - Factory
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
