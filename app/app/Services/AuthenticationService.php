<?php

// Change here.

namespace App\Services;

use App\Exceptions\LoginFailedException;

use App\Services\Contracts\IAuthenticationService;

use App\Services\Contracts\IUserService;

use App\Validation\Contracts\IAuthenticationLoginRequestValidation;

class AuthenticationService implements IAuthenticationService
{
    private $userService;

    private $authenticationLoginRequestValidation;

    public function __construct(IUserService $userService, IAuthenticationLoginRequestValidation $authenticationLoginRequestValidation) {
        $this->userService = $userService;

        $this->authenticationLoginRequestValidation = $authenticationLoginRequestValidation;
    }

    public function login($data)
    {
        $this->authenticationLoginRequestValidation->validate($data);

        if ($this->userService->credentialsVerified($data['email'], $data['password']))
        {
            return $this->userService->refreshApiKeyByEmail($data['email']);
        }

        throw new LoginFailedException("The provided credentials are not correct.");
    }
}

?>