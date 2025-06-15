<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $faker= Faker::create();
        $orders= Order::all();
        $products = Product::all();
        foreach( $orders as $order){
            $product = $products->random();
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$product->id,
                'quantity' => $faker->numberBetween(1, 5),
                'price' => $faker->randomFloat(2, 20, 200),
            ]);
        }
    }
}
