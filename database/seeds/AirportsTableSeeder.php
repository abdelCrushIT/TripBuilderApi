<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Airport as Airport;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$airportsToSeed = [
        	['code' => 'CDG', 'name' => 'Charles de Gaulle', 'city' => 'Paris'],
        	['code' => 'YUL', 'name' => 'Montreal-Pierre Elliott Trudeau International Airport', 'city' => 'Montreal'],
        	['code' => 'LHR', 'name' => 'London Heathrow', 'city' => 'London'],
        	['code' => 'MUC', 'name' => 'Franz Josef Strauss', 'city' => 'Munich'],
        	['code' => 'DBX', 'name' => 'Dubai Airport', 'city' => 'Dubai'],
        	['code' => 'FCO', 'name' => 'Leonardo da Vinci-Fiumicino', 'city' => 'Rome'],
        	['code' => 'JFK', 'name' => 'John F. Kennedy International', 'city' => 'New York'],
        	['code' => 'LAX', 'name' => 'Los Angeles International Airport', 'city' => 'Los Angeles'],
        	['code' => 'YYZ', 'name' => 'Pearson International Airport', 'city' => 'Toronto'],
        	['code' => 'IST', 'name' => 'Istanbul Ataturk', 'city' => 'Istanbul']
        ];

        foreach($airportsToSeed as $airport) {
        	try{
        		Airport::create($airport);
        	}catch (Exception $ex){
        		$this->command->error($ex->getMessage());
        	}
        }
    }
}
