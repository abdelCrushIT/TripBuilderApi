<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

class TripRepository extends Repository implements RepositoryInterface {

	public function model() {
		return 'App\models\Trip';
	}

	public function addFlight($trip, $flight) {
		$trip->flights()->attach($flight);
	}

	public function deleteFlight($trip, $flight) {
		$trip->flights()->detach($flight);
	}

}