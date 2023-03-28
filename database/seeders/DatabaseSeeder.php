<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Comment;
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

        //Comment - Factory
        $dataComment = [
            ['commentable_id' => 1, 'text' => 'This cake is absolutely delicious! The blueberries are fresh and add the perfect touch of sweetness. Highly recommend!'],
            ['commentable_id' => 2, 'text' => 'I was blown away by how amazing this cake tasted! The rich chocolate flavor combined with the smooth frosting made it a total hit at my party.'],
            ['commentable_id' => 3, 'text' => 'The colors of this cake are so vibrant and fun! And the taste is just as amazing. I love how each layer has a unique flavor that all work so well together'],
            ['commentable_id' => 4, 'text' => 'I\'m a big fan of berries and this cake did not disappoint. The mix of different berries in each bite was so satisfying. I\'ll definitely be ordering this one again'],
            ['commentable_id' => 5, 'text' => 'I was skeptical at first, but this cake blew me away! The pancake layers were fluffy and the maple syrup frosting was the perfect touch. Such a unique and delicious cake'],
            ['commentable_id' => 6, 'text' => 'This cake is truly a work of art! The intricate design on top was almost too pretty to eat, but once I did, I was in heaven. The flavor was amazing and the texture was so light and airy'],
            ['commentable_id' => 7, 'text' => 'This cake is so smooth and creamy, it\'s like velvet in your mouth! The classic red velvet flavor is spot on and the cream cheese frosting is the perfect complement'],
            ['commentable_id' => 8, 'text' => 'If you\'re a chocolate lover like me, this cake is a must-try. The rich chocolate flavor is so decadent and the ganache frosting takes it to the next level. I couldn\'t get enough!'],
            ['commentable_id' => 9, 'text' => 'I ordered this cake for a special occasion and it did not disappoint. The combination of flavors was so unique and delicious. I especially loved the caramel drizzle on top'],
            ['commentable_id' => 10, 'text' => 'Don\'t be scared by the name, this cake is amazing! The dark chocolate flavor is so rich and the edible spider on top is a fun touch. This cake is definitely a showstopper'],
            ['commentable_id' => 11, 'text' => 'I was intrigued by the name and had to try this cake. It\'s such a unique flavor and the green color is so fun. The pistachio flavor is really subtle and the texture is perfect'],
            ['commentable_id' => 12, 'text' => 'This cake is like a tropical paradise in every bite! The pineapple flavor is so refreshing and the gold leaf on top makes it feel extra special. I\'ll be dreaming of this cake all summer long'],
            ['commentable_id' => 13, 'text' => 'If you\'re an Oreo fan, you need to try this cake! The layers of crushed Oreos and frosting are so delicious and the cookie crumbles on top add the perfect crunch'],
            ['commentable_id' => 14, 'text' => 'This cake is a fruit lover\'s dream! The mix of fresh fruit on top is so refreshing and the light sponge cake underneath is the perfect base. I could eat this cake every day!'],
            ['commentable_id' => 15, 'text' => 'I was so excited to try this cake and it exceeded my expectations. The milk chocolate flavor is so smooth and creamy, and the hazelnut crunch on top adds the perfect texture. I\'ll be ordering this one again for sure'],
            ['commentable_id' => 16, 'text' => 'This cake is so unique and fun! The chocolate-covered \'ants\' on top are such a creative touch and the cake itself is so moist and flavorful. I loved every bite'],
        ];
        foreach ($dataComment as $item){
            Comment::factory()->create($item);
        }

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
