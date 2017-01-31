<?php 

/**
 * Airport.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Airport
 * Airport class
 * property   string $code airport code
 * property   string $name airport name
 * property   string $city airport city name
 * property   datetime $created_at creation time in the database
 * property   datetime $updated_at update time un the database 
 */
class Airport extends Model
{
	protected $fillable = ['code', 'name', 'city', 'created_at','updated_at'];

	public function flightsFrom() {
		return $this->hasMany('App\Models\Airport', 'depart_airport_id');
	}

	public function flightsTo() {
		return $this->hasMany('App\Models\Airport', 'dest_airport_id');
	}
}