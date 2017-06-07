<?php

// Change here.

namespace App\DataAccess\Models;

use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    public $timestamps = false;

    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}

?>