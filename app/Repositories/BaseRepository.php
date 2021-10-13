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
        $infoModel = $this->model->find($id);
        if (!$infoModel) {
            return false;
        }

        return $this->model->find($id);
    }

    public function add($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $infoModel = $this->findById($id);
        if (!$infoModel) {
            return false;
        }

        $updateFlag = $infoModel->update($data);
        if (!$updateFlag) {
            return false;
        }

        return tap($infoModel)->update($data);
    }

    public function delete($id)
    {
        $infoModel = $this->findById($id);
        return $infoModel->delete($id);
    }
}
