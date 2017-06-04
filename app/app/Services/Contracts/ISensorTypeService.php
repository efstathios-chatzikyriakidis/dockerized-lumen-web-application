<?php

// Change here.

namespace App\Services\Contracts;

interface ISensorTypeService
{
    public function getAll();

    public function shouldGetById($id);
}

?>