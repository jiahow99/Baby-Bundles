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

        DB::table('products')->insert(
            [
                'title' => 'MamyPoko Extra Dry Skin Top'
            ],
            [

            ]
        );

        
    }
}
