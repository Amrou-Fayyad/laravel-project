<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class AddressSeeder extends Seeder
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
            Address::create([

            'city' => $faker->city,
            'street' => $faker->streetAddress,
            'postal_code' => $faker->postcode,
            'user_id' => $user->id,
               
            ]);
            

        }
    }
}