<?php

// Change here.

namespace App\Transformers\Infrastructure;

interface ITransformerService
{
    public function item ($data, ITransformer $transformer, $includes = null);

    public function collection ($data, ITransformer $transformer, $includes = null);
}

?>