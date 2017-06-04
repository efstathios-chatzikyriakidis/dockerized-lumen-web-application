<?php

// Change here.

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use App\Services\Contracts\IUserService;

use Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService) {
        $this->middleware('auth');

        $this->userService = $userService;
    }

    public function index() {
        return $this->json_response($this->userService->getAll(), Response::HTTP_OK);
    }

    public function create(Request $request) {
        return $this->json_response($this->userService->create($request->all()), Response::HTTP_CREATED);
    }
}

?>