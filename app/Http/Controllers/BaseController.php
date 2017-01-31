<?php

/**
 * BaseController.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;



abstract class BaseController extends Controller
{

	protected $repository;

    /**
     * @param App $app
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeRepository();
    }
    
    /**
     * Makes a repository.
     *
     * @return     Repository  
     */
    public function makeRepository() {
        $repository = $this->app->make($this->repository());
        return $this->repository = $repository;
    }

    /**
     * Specify Repository class name
     * 
     * @return mixed
     */
    abstract function repository();

    /**
     * return all ressources 
     */
    public function index() {
    	$data = $this->repository->all();
        return response()->json(['data' => $data], 200);
    }

    /**
     * Searches for the first match.
     *
     * @param      integer  $id     The ressource identifier
     *
     * @return     Json response  
     */
    public function find($id) {
        $data = $this->repository->find($id);
        return response()->json(['data' => $data], 200);
    }
}
