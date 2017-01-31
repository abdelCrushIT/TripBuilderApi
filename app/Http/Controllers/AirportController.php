<?php

/**
 * AirportController.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

/**
 * AirportController
 * AirportController class
 */
class AirportController extends BaseController
{

	/**
     * Makes a repository.
     *
     * @return     App\Repositories\TripRespositories
     */
	public function repository() {
		return 'App\Repositories\AirportRepository';
	}

}