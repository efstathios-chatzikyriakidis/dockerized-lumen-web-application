<?php

// Change here.

namespace App\Validation;

use App\Validation\Infrastructure\RequestValidation;

use App\Validation\Contracts\IUserCreateRequestValidation;

class UserCreateRequestValidation extends RequestValidation implements IUserCreateRequestValidation {
    function rules() {
        return [
            'firstName' => 'required|string|max:100',

            'lastName' => 'required|string|max:100',

            'email' => 'required|string|max:100|email|unique:users',

            'password' => 'required|string|between:6,50'
        ];
    }
}

?>