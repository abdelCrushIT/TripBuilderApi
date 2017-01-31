<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

class AirportRepository extends Repository implements RepositoryInterface {

	public function model() {
		return 'App\models\Airport';
	}

	public function all($columns = array('*')) {
		return $this->model->orderBy('city', 'asc')->get($columns);
	}
}