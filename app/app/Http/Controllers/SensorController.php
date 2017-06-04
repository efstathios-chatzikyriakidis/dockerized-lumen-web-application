<?php

// Change here.

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use App\Services\Contracts\ISensorService;

use Auth;

class SensorController extends Controller
{
    private $sensorService;

    public function __construct(ISensorService $sensorService) {
        $this->middleware('auth');

        $this->sensorService = $sensorService;
    }

    public function index() {
        return $this->json_response($this->sensorService->getAll(), Response::HTTP_OK);
    }

    public function create(Request $request) {
        return $this->json_response($this->sensorService->create($request->all()), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) {
        return $this->json_response($this->sensorService->updateById($id, $request->all()), Response::HTTP_OK);
    }

    public function delete($id) {
        $this->sensorService->deleteById($id);

        return $this->empty_response(Response::HTTP_NO_CONTENT);
    }
}

?>