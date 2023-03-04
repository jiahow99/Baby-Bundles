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

        // Product
        // for ($i=0; $i <15 ; $i++) { 
        //     DB::table('products')->insert([
        //         [
        //             'title' => 'Baby Boy Girl Set Ribbed Cotton Solid Color',
        //             'description' => 'Brand Name: Kid Tales, Material: Cotton, Age Range: 7-12, Unisex Style Fashion Collar',
        //             'condition' => rand(3, 5),
        //             'price' => rand(1000, 4000)/100,
        //             'user_id' => 52,
        //             'category_id' => 3
        //         ],
        //         [
        //             'title' => 'Newborn Infant Baby Boy Girl Clothes Cotton T Shit',
        //             'description' => 'Baby Animal Costume Toddler Baby winter Flannel Onesie Sleepwear Soft Bodysuit Kids Outfit Set',
        //             'condition' => rand(3, 5),
        //             'price' => rand(1000, 4000)/100,
        //             'user_id' => 52,
        //             'category_id' => 3
        //         ],
        //         [
        //             'title' => 'Ramper Hooded Jumpsuit',
        //             'description' => "Children's Animal Performance Clothes Kindergarten Performance One-Piece Piggy Tiger Monkey Costume",
        //             'condition' => rand(3, 5),
        //             'price' => rand(1000, 4000)/100,
        //             'user_id' => 52,
        //             'category_id' => 3
        //         ]
        //     ]);
        // }
        


        // 251 - 280

        // Images
        for ($i=281; $i < 317; $i+=3) { 
            DB::table('images')->insert([
                [
                    'src' => 'img/bottom/bottom02.jpg',
                    'product_id' => $i
                ],
                [
                    'src' => 'img/bottom/bottom04.jpg',
                    'product_id' => $i+1
                ],
                [
                    'src' => 'img/bottom/bottom7.jpg',
                    'product_id' => $i+2
                ]
            ]);
        }

        


        

        
    }
}
