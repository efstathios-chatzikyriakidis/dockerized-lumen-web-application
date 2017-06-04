<?php

// Change here.

namespace App\DataAccess\Repositories;

use App\DataAccess\Infrastructure\EloquentRepository;

use App\DataAccess\Repositories\Contracts\ISensorRepository;

use App\DataAccess\Models\Sensor;

class SensorRepository extends EloquentRepository implements ISensorRepository {
    protected function model() {
        return Sensor::class;
    }
}

?>