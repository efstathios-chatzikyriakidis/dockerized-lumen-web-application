<?php

namespace App\Transformers;

use App\DataAccess\Models\Sensor;

use App\Transformers\Contracts\ISensorTransformer;

use League\Fractal\TransformerAbstract;

class SensorTransformer extends TransformerAbstract implements ISensorTransformer
{
    protected $availableIncludes = [
        'sensorType'
    ];

    public function includeSensorType(Sensor $model)
    {
        return $this->item($model->sensorType, new SensorTypeTransformer ());
    }

    public function transform(Sensor $model)
    {
        return [
            'id'  => $model->id,

            'label' => $model->label,

            'pointLatitude'  => $model->point_latitude,

            'pointLongitude'  => $model->point_longitude
        ];
    }
}

?>