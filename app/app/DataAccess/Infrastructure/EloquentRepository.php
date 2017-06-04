<?php

// Change here.

namespace App\DataAccess\Infrastructure;

use Illuminate\Container\Container;

abstract class EloquentRepository implements IRepository
{
    private $app;

    protected $model;

    public function __construct(Container $app)
    {
        $this->app = $app;

        $this->makeModel();
    }

    protected abstract function model();

    private function makeModel()
    {
        return $this->model = $this->app->make($this->model());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function existsById($id)
    {
        return $this->model->whereKey($id)->exists();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function updateByModel($model, array $data)
    {
        $model->fill($data);

        $model->save();
    }

    public function deleteByModel($model)
    {
        $model->delete();
    }
}

?>