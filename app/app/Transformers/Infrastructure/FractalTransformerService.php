<?php

// Change here.

namespace App\Transformers\Infrastructure;

use League\Fractal\Manager;

use League\Fractal\Resource\Item;

use League\Fractal\Resource\Collection;

use League\Fractal\Resource\ResourceInterface;

class FractalTransformerService implements ITransformerService
{
    private $manager;

    public function __construct(Manager $manager) {
        $this->manager = $manager;
    }

    public function item($data, ITransformer $transformer, $includes = null)
    {
        return $this->createDataArray(new Item($data, $transformer), $includes);
    }

    public function collection($data, ITransformer $transformer, $includes = null)
    {
        return $this->createDataArray(new Collection($data, $transformer), $includes);
    }

    private function createDataArray(ResourceInterface $resource, $includes)
    {
        if ($includes != null)
        {
            $this->manager->parseIncludes($includes);
        }

        return $this->manager->createData($resource)->toArray();
    }
}

?>