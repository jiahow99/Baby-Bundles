<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()->count(10)->create()->each(function($user){
        //     $user->products()->save(Product::factory()->make());
        // });  

        // DB::table('products')->insert([
        //     [
        //         'title' => 'MamyPoko Extra Dry Skin Top',
        //         'description' => 'Speed Air Wave sheet absorb instantly to keep bottom completely dry',
        //         'condition' => rand(3, 5),
        //         'price' => rand(1000, 4000)/100,
        //         'user_id' => 52,
        //         'category_id' => 1
        //     ],
        //     [
        //         'title' => 'Newborn Baby Romper One-Piece Dinosaur',
        //         'description' => 'Baby Animal Costume Toddler Baby winter Flannel Onesie Sleepwear Soft Bodysuit',
        //         'condition' => rand(3, 5),
        //         'price' => rand(1000, 4000)/100,
        //         'user_id' => 52,
        //         'category_id' => 1
        //     ],
        //     [
        //         'title' => "Children's Animal Performance Clothes Kindergarten Performance",
        //         'description' => "Children's Animal Performance Clothes Kindergarten Performance One-Piece Piggy Tiger Monkey Costume",
        //         'condition' => rand(3, 5),
        //         'price' => rand(1000, 4000)/100,
        //         'user_id' => 52,
        //         'category_id' => 1
        //     ]
        // ]);


        // 251 - 280

        $i=260;

        DB::table('images')->insert([
            [
                'src' => 'img/top/top01.jpg',
                'product_id' => $i
            ],
            [
                'src' => 'img/top/top03.jpg',
                'product_id' => $i+1
            ],
            [
                'src' => 'img/top/top10.jpg',
                'product_id' => $i+2
            ]
        ]);


        

        
    }
}
