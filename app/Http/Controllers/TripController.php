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
     * @return     App\Repositories\TripRespositories
     */
    public function makeRepository() {
        $repository = $this->app->make($this->repository());
        $this->airportRepository = $this->app->make('App\Repositories\AirportRepository');
        $this->flightRepository = $this->app->make('App\Repositories\FlightRepository');
        return $this->repository = $repository;
    }

    /**
     * Get repository class
     *
     * @return     string 
     */
	public function repository() {
		return 'App\Repositories\TripRepository';
	}

	/**
	 * Searches for a trip with its flights		
	 *
	 * @param      integer  $tripId  The trip identifier
	 *
	 * @return     array    trip infos
	 */
	public function find($tripId) {
		$trip = $this->repository->find($tripId);
		if(!$trip) {
			return response()->json(['message' => 'Trip not found'], 404);
		}
		$flights = $trip->flights()->get();
		return response()->json([ 'trip' => $trip, 'flights' => $flights ], 200);
		return array('trip'=> $trip, 'flights' => $flights);
	}

	/**
	 * Adds a flight.
	 *
	 * @param      integer  $tripId      The trip identifier
	 * @param      string  $departCode  The depart code
	 * @param      string  $destCode    The destination code
	 */
	public function addFlight($tripId, $departCode, $destCode) {
		$flight = $this->checkFlight($departCode, $destCode);
		$trip = $this->repository->find($tripId);
		$this->repository->addFlight($trip, $flight);
		return response()->json(['message' => 'Flight added to the Trip'], 200);
	}

	/**
	 * Deletes a flight
	 *
	 * @param      integer  $tripId      The trip identifier
	 * @param      string  $departCode  The depart code
	 * @param      string  $destCode    The destination code
	 */
	public function deleteFlight($tripId, $departCode, $destCode) {
		$flight = $this->checkFlight($departCode, $destCode);
		$trip = $this->repository->find($tripId);
		$this->repository->deleteFlight($trip, $flight);
		return response()->json(['message' => 'Flight deleted from the Trip'], 200);
	}

	/**
	 * check if a flight exists
	 *
	 * @param      string  $departCode  The depart code
	 * @param      string  $destCode    The destination code			
	 *
	 * @return     Json response	  
	 */
	public function checkFlight($departCode, $destCode) {
		$departAirport = $this->airportRepository->findBy('code', $departCode, ['id']);
		$destAirport = $this->airportRepository->findBy('code', $destCode, ['id']);
		$flight = $this->flightRepository->findByAirports($departAirport, $destAirport);
		if(!$flight) {
			return response()->json(['message' => 'Flight not found'], 404);
		}
		return $flight;
	}
}