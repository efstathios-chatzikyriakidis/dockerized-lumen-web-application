<?php

// Change here.

namespace App\Services\Contracts;

interface ISensorService
{
    public function getAll();

    public function create($data);

    public function updateById($id, $data);

    public function deleteById($id);

    public function shouldGetById($id);
}

?>