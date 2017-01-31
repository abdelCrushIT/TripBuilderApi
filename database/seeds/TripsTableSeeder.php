<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Trip;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        foreach(range(1,5) as $index){
            $trip = Trip::create([
                'reservation_code' => $faker->unique()->text(5)
            ]);
            $trip->flights()->sync([$faker->numberBetween(1,10),$faker->numberBetween(1,10)]);
        }
    }
}
