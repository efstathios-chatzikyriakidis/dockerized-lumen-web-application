<?php

// Change here.

namespace App\Services;

use App\Services\Contracts\ISensorTypeService;

use App\DataAccess\Repositories\Contracts\ISensorTypeRepository;

use App\Exceptions\ResourceNotFoundException;

class SensorTypeService implements ISensorTypeService
{
    private $sensorTypeRepository;

    public function __construct(ISensorTypeRepository $sensorTypeRepository) {
        $this->sensorTypeRepository = $sensorTypeRepository;
    }

    public function getAll()
    {
        return $this->sensorTypeRepository->getAll();
    }

    public function shouldGetById($id)
    {
        $model = $this->sensorTypeRepository->getById($id);

        if(!$model) {
            throw new ResourceNotFoundException("The sensor type with identifier '{$id}' does not exist.");
        }

        return $model;
    }
}

?>