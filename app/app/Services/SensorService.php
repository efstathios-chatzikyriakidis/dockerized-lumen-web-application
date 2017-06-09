<?php

// Change here.

namespace App\Services;

use App\Services\Contracts\ISensorService;

use App\Services\Contracts\ISensorTypeService;

use App\DataAccess\Repositories\Contracts\ISensorRepository;

use App\Validation\Contracts\ISensorCreateRequestValidation;

use App\Validation\Contracts\ISensorUpdateRequestValidation;

use App\Exceptions\ResourceNotFoundException;

class SensorService implements ISensorService
{
    private $sensorRepository;

    private $sensorTypeService;

    private $sensorCreateRequestValidation;

    private $sensorUpdateRequestValidation;

    public function __construct(ISensorRepository $sensorRepository,
                                ISensorTypeService $sensorTypeService,
                                ISensorCreateRequestValidation $sensorCreateRequestValidation,
                                ISensorUpdateRequestValidation $sensorUpdateRequestValidation) {
        $this->sensorRepository = $sensorRepository;

        $this->sensorTypeService = $sensorTypeService;

        $this->sensorCreateRequestValidation = $sensorCreateRequestValidation;

        $this->sensorUpdateRequestValidation = $sensorUpdateRequestValidation;
    }

    public function getAll()
    {
        return $this->sensorRepository->getAll();
    }

    public function create($data)
    {
        $this->sensorCreateRequestValidation->validate($data);

        $this->sensorTypeService->shouldGetById($data['sensorType']['id']);

        $input = [
            'label' => $data['label'],

            'point_latitude' => $data['pointLatitude'],

            'point_longitude' => $data['pointLongitude'],

            'sensor_type_id' => $data['sensorType']['id']
        ];

        return $this->sensorRepository->create($input);
    }

    public function updateById($id, $data)
    {
        $this->sensorUpdateRequestValidation->validate($data);

        $this->sensorTypeService->shouldGetById($data['sensorType']['id']);

        $model = $this->shouldGetById($id);

        $input = [
            'label' => $data['label'],

            'point_latitude' => $data['pointLatitude'],

            'point_longitude' => $data['pointLongitude'],

            'sensor_type_id' => $data['sensorType']['id']
        ];

        $this->sensorRepository->updateByModel($model, $input);

        return $this->sensorRepository->getById($id);
    }

    public function deleteById($id)
    {
        $model = $this->shouldGetById($id);

        $this->sensorRepository->deleteByModel($model);
    }

    public function shouldGetById($id)
    {
        $model = $this->sensorRepository->getById($id);

        if(!$model) {
            throw new ResourceNotFoundException("The sensor with identifier '{$id}' does not exist.");
        }

        return $model;
    }
}

?>