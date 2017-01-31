<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

class FlightRepository extends Repository implements RepositoryInterface {

	public function model() {
		return 'App\models\Flight';
	}

	public function findByAirports($departAirport, $destAirport) {
		return $flight = $this->model->where('depart_airport_id','=',$departAirport->id)
									->where('dest_airport_id','=',$destAirport->id)->first();
	}
}