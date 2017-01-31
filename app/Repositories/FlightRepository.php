<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

class FlightRepository extends Repository implements RepositoryInterface {

	/**
	 * Set model
	 *
	 * @return     string  model class
	 */
	public function model() {
		return 'App\models\Flight';
	}

	/**
	 * Find flight by departure and destination airports
	 *
	 * @param      Eloquent  $departAirport  The depart airport
	 * @param      Eloquent  $destAirport    The destination airport
	 *
	 * @return     Eloquent  Flight
	 */

	public function findByAirports($departAirport, $destAirport) {
		return $flight = $this->model->where('depart_airport_id','=',$departAirport->id)
									->where('dest_airport_id','=',$destAirport->id)->first();
	}
}