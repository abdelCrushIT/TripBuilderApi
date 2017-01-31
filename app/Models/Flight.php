<?php 

/**
 * Flight.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Flight
 * Flight class
 * property   string $code flight code
 * property   int $depart_airport_id departure airport id
 * property   int $dest_airport_id destination airport id
 * property   datetime $created_at creation time in the database
 * property   datetime $updated_at update time un the database 
 */
class Flight extends Model
{
	protected $fillable = ['code', 'airline', 'depart_airport_id', 'dest_airport_id', 'created_at','updated_at'];

	public function departAirport() {
		return $this->belongsTo('App\Models\Airport', 'depart_airport_id');
	}

	public function destAirport() {
		return $this->belongsTo('App\Models\Airport', 'dest_airport_id');
	}

	public function trips() {
		return $this->belongsToMany('App\Models\Flight');
	}
}