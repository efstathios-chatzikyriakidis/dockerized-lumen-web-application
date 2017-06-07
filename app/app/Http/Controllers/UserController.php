<?php

// Change here.

namespace App\Http\Controllers;

use App\Transformers\Infrastructure\ITransformerService;

use App\Services\Contracts\IUserService;

use App\Transformers\Contracts\IUserTransformer;

use App\Constants;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    private $userService;

    private $userTransformer;

    private $transformerService;

    public function __construct(ITransformerService $transformerService, IUserService $userService, IUserTransformer $userTransformer) {
        $this->middleware('auth');

        $this->transformerService = $transformerService;

        $this->userTransformer = $userTransformer;

        $this->userService = $userService;
    }

    public function index(Request $request) {
        return $this->json_response($this->transformerService->collection($this->userService->getAll(), $this->userTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_OK);
    }

    public function create(Request $request) {
        return $this->json_response($this->transformerService->item($this->userService->create($request->all()), $this->userTransformer, $request->input(Constants::REQUEST_INCLUDE_PARAMETER_KEY)), Response::HTTP_CREATED);
    }
}

?>