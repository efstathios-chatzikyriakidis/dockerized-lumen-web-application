<?php

// Change here.

namespace App\DataAccess\Repositories;

use App\DataAccess\Infrastructure\EloquentRepository;

use App\DataAccess\Repositories\Contracts\ISensorTypeRepository;

use App\DataAccess\Models\SensorType;

class SensorTypeRepository extends EloquentRepository implements ISensorTypeRepository {
    protected function model() {
        return SensorType::class;
    }
}

?>