<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Airport as Airport;
use App\Models\Flight as Flight;
use Illuminate\Support\Arr;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        // following line retrieve all the airports_ids from DB
        $airports = Arr::pluck(Airport::all(), 'id');
        foreach(range(1,10) as $index){
            try{
            	Flight::create([
                'code' => $faker->unique()->text(5),
                'airline' => $faker->text(10),
                'depart_airport_id' => $faker->randomElement($airports),
                'dest_airport_id' => $faker->randomElement($airports)
            	]);
            }catch(Exception $ex){
            	$this->command->error($ex->getMessage());
            }
        }
    }
}
