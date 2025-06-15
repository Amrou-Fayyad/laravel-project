<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\Category;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker= Faker::create();
       $Categorys = Category::all();
       foreach ($Categorys as $category) {
        Product::create([
            'name'=> $faker->name,
            'description'=>$faker->sentence,
            'price'=>$faker->randomFloat(2, 10, 200),
            'stock'=> $faker->numberBetween(10, 100),
            'category_id'=>$category->id,
        ]);
    }
}
}