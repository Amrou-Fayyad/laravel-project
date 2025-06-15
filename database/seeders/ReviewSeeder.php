<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        $users= User::all();
        $products = Product::all();
        foreach($users as $user){
        $product = $products->random();
            Review::create([
                'user_id'=>$user->id,
                'product_id'=>$product->id,
                'rating' => $faker->numberBetween(1, 5),
                'comment' => $faker->paragraph,
            ]); 
        

        }
       
    }
}
