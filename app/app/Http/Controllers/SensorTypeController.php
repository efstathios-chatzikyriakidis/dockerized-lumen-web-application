<?php

// Change here.

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Services\Contracts\ISensorTypeService;

use Auth;

class SensorTypeController extends Controller
{
    private $sensorTypeService;

    public function __construct(ISensorTypeService $sensorTypeService) {
        $this->middleware('auth');

        $this->sensorTypeService = $sensorTypeService;
    }

    public function index() {
        return $this->json_response($this->sensorTypeService->getAll(), Response::HTTP_OK);
    }
}

?>