<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        $users=User::all();
        foreach ($users as $user) {
            $address = Address::where('user_id', $user->id)->first();
            if ($address) {
            Order::create([
                'user_id' => $user->id,
                'status' => $faker->randomElement(['pending', 'shipped', 'delivered']),
                'total_price'=> $faker->randomFloat(2, 50, 500),
                'address_id'=>$address->id,
                'created_at'=>now(),
             ]);
            }
            
        }
    }
}
