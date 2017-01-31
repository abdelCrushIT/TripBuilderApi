<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AirportController extends BaseController
{

	public function repository() {
		return 'App\Repositories\AirportRepository';
	}

}