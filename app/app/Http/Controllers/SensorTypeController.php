<?php

// Change here.

namespace App\Http\Controllers;

use App\Transformers\Infrastructure\ITransformerService;

use App\Services\Contracts\ISensorTypeService;

use App\Transformers\Contracts\ISensorTypeTransformer;

use App\Constants;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Auth;

class SensorTypeController extends Controller
{
    private $sensorTypeService;

    private $sensorTypeTransformer;

    private $transformerService;

    public function __construct(ITransformerService $transformerService, ISensorTypeService $sensorTypeService, ISensorTypeTransformer $sensorTypeTransformer) {
        $this->middleware('auth');

        $this->transformerService = $transformerService;

        $this->sensorTypeService = $sensorTypeService;

        $this->sensorTypeTransformer = $sensorTypeTransformer;
    }

    public function index(Request $request) {
        return $this->json_response($this->transformerService->collection($this->sensorTypeService->getAll(), $this->sensorTypeTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_OK);
    }
}

?>