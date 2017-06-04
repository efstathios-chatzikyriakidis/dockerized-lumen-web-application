<?php

// Change here.

namespace App\Validation;

use App\Validation\Infrastructure\RequestValidation;

use App\Validation\Contracts\ISensorCreateRequestValidation;

class SensorCreateRequestValidation extends RequestValidation implements ISensorCreateRequestValidation {
    function rules() {
        return [
            'label' => 'required|string|max:100',

            'pointLatitude' => 'required|numeric|between:-90,+90',

            'pointLongitude' => 'required|numeric|between:-180,+180',

            'sensorTypeId' => 'required|integer'
        ];
    }
}

?>