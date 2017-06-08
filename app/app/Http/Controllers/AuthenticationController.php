<?php

// Change here.

namespace App\Http\Controllers;

use App\DTOs\AuthenticationLoginResultDto;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use App\Services\Contracts\IAuthenticationService;

class AuthenticationController extends Controller
{
    private $authenticationService;

    public function __construct(IAuthenticationService $authenticationService) {
        $this->authenticationService = $authenticationService;
    }

    public function login(Request $request) {
        return $this->json_response(new AuthenticationLoginResultDto($this->authenticationService->login($request->all())), Response::HTTP_OK);
    }
}

?>