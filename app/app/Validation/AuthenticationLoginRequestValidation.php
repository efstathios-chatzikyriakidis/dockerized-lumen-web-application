<?php

// Change here.

namespace App\Validation;

use App\Validation\Infrastructure\RequestValidation;

use App\Validation\Contracts\IAuthenticationLoginRequestValidation;

class AuthenticationLoginRequestValidation extends RequestValidation implements IAuthenticationLoginRequestValidation {
    function rules() {
        return [
            'email' => 'required',

            'password' => 'required'
        ];
    }
}

?>