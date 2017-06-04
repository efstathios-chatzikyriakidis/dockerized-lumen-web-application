<?php

// Change here.

namespace App\DataAccess\Infrastructure;

interface IRepository
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function existsById($id);

    public function updateByModel($model, array $data);

    public function deleteByModel($model);
}

?>