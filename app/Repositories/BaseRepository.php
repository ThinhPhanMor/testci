<?php

namespace App\Repositories;

class BaseRepository implements BaseInterface
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function add($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $infoModel = $this->findById($id);
        return tap($infoModel)->update($data);
    }

    public function delete($id)
    {
        $infoModel = $this->findById($id);
        return $infoModel->delete($id);
    }
}
