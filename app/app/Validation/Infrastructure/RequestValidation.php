<?php

// Change here.

namespace App\Validation\Infrastructure;

use App\Exceptions\RequestValidationException;

use Validator;

abstract class RequestValidation implements IRequestValidation {
    protected abstract function rules();

    public function isInvalid($data)
    {
        return $this->makeValidator($data)->fails();
    }

    public function validate($data)
    {
        $validator = $this->makeValidator($data);

        if ($validator->fails())
        {
            throw new RequestValidationException("The request is invalid.", implode(', ', $validator->errors()->all('[:message]')));
        }
    }

    private function makeValidator($data)
    {
        return Validator::make($data, $this->rules());
    }
}

?>