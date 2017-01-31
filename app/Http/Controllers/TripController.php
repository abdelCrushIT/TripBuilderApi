<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\AirportRepository;
use App\Repositories\FlightRepository;

class TripController extends BaseController
{

	private $airportRepository;
	private $flighRepository;
    /**
     * Makes a repository.
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function makeRepository() {
        $repository = $this->app->make($this->repository());
        $this->airportRepository = $this->app->make('App\Repositories\AirportRepository');
        $this->flightRepository = $this->app->make('App\Repositories\FlightRepository');
        return $this->repository = $repository;
    }

	public function repository() {
		return 'App\Repositories\TripRepository';
	}

	public function find($tripId) {
		$trip = $this->repository->find($tripId);
		$flights = $trip->flights()->get();
		return array('trip'=> $trip, 'flights' => $flights);
	}

	public function addFlight($tripId, $departCode, $destCode) {
		$flight = $this->checkFlight($departCode, $destCode);
		$trip = $this->repository->find($tripId);
		$this->repository->addFlight($trip, $flight);
	}

	public function deleteFlight($tripId, $departCode, $destCode) {
		$flight = $this->checkFlight($departCode, $destCode);
		$trip = $this->repository->find($tripId);
		$this->repository->deleteFlight($trip, $flight);
	}

	public function checkFlight($departCode, $destCode) {
		$departAirport = $this->airportRepository->findBy('code', $departCode, ['id']);
		$destAirport = $this->airportRepository->findBy('code', $destCode, ['id']);
		$flight = $this->flightRepository->findByAirports($departAirport, $destAirport);
		return $flight;
	}
}