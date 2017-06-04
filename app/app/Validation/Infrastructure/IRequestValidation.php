<?php

// Change here.

namespace App\Validation\Infrastructure;

interface IRequestValidation
{
    public function isInvalid($data);

    public function validate($data);
}

?>