<?php

// Change here.

namespace App\Exceptions;

use Exception;

class RequestValidationException extends Exception
{
    private $errors;

    public function __construct($message, $errors) {
        $this->errors = $errors;

        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

?>