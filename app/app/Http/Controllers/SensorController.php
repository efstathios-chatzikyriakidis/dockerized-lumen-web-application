<?php

// Change here.

namespace App\Http\Controllers;

use App\Transformers\Infrastructure\ITransformerService;

use App\Transformers\Contracts\ISensorTransformer;

use App\Services\Contracts\ISensorService;

use App\Constants;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    private $sensorService;

    private $sensorTransformer;

    private $transformerService;

    public function __construct(ITransformerService $transformerService, ISensorService $sensorService, ISensorTransformer $sensorTransformer) {
        $this->sensorTransformer = $sensorTransformer;

        $this->transformerService = $transformerService;

        $this->sensorService = $sensorService;
    }

    public function index(Request $request) {
        return $this->json_response($this->transformerService->collection($this->sensorService->getAll(), $this->sensorTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_OK);
    }

    public function create(Request $request) {
        return $this->json_response($this->transformerService->item($this->sensorService->create($request->all()), $this->sensorTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) {
        return $this->json_response($this->transformerService->item($this->sensorService->updateById($id, $request->all()), $this->sensorTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_OK);
    }

    public function delete($id) {
        $this->sensorService->deleteById($id);

        return $this->empty_response(Response::HTTP_NO_CONTENT);
    }
}

?>