<?php

namespace App\Transformers;

use App\DataAccess\Models\SensorType;

use App\Transformers\Contracts\ISensorTypeTransformer;

use League\Fractal\TransformerAbstract;

class SensorTypeTransformer extends TransformerAbstract implements ISensorTypeTransformer
{
    protected $availableIncludes = [
        'sensors'
    ];

    public function includeSensors(SensorType $model)
    {
        return $this->collection($model->sensors, new SensorTransformer ());
    }

    public function transform(SensorType $model)
    {
        return [
            'id' => $model->id,

            'name' => $model->name
        ];
    }
}

?>