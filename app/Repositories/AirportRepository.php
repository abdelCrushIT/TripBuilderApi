<?php

/**
 * Flight.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

/**
 * AirportRepository
 * AirportRepository Class
 */

class AirportRepository extends Repository implements RepositoryInterface {

	/**
	 * Set model
	 *
	 * @return     string  model class
	 */
	public function model() {
		return 'App\models\Airport';
	}

	/**
	 * Get All Airports
	 *
	 * @param      array   $columns  The columns
	 *
	 * @return     Collection  Airports collection
	 */
	public function all($columns = array('*')) {
		return $this->model->orderBy('city', 'asc')->get($columns);
	}
}