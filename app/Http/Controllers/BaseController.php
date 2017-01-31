<?php

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
     * @return Repository
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

    public function index() {
    	$data = $this->repository->all();
    	echo json_encode($data);
    }

    public function find($id) {
        $data = $this->repository->find($id);
        echo json_encode($data);
    }

    public function create(Request $request) {
    	$data = $this->prepareDataFromRequest($request);
        $this->repository->create($data);
    	return redirect('/');
    }

    public function edit(Request $request) {
    	$data = $this->prepareDataFromRequest($request);
    	$this->repository->update($data, $request->input('id'));
    	return redirect('/');
    }
  

    //destroy a game
    public function delete(Request $request) {
    	$this->repository->delete($request->input('id'));
    	return redirect('/');
    }
}
