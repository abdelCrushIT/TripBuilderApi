<?php 

/**
 * Trip.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;

/**
 * Trip
 * Trip class
 * property   string $reservation_code reservation code
 * property   datetime $created_at creation time in the database
 * property   datetime $updated_at update time un the database 
 */
class Trip extends Model
{
	protected $fillable = ['reservation_code', 'created_at','updated_at'];
	protected $guarded = ['id'];

	public function flights() {
		return $this->belongsToMany('App\Models\Flight');
	}

}