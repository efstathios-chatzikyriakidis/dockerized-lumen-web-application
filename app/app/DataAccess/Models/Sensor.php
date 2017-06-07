<?php

// Change here.

namespace App\DataAccess\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'label',

        'point_latitude',

        'point_longitude',

        'sensor_type_id'
    ];

    public function sensorType()
    {
        return $this->belongsTo(SensorType::class);
    }
}

?>