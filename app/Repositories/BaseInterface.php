<?php

namespace App\Repositories;

interface BaseInterface
{
    // Get All
    public function getAll();

    // Find By Id
    public function findById($id);

    // save new record
    public function add($data);

    // update record by id
    public function update($data, $id);

    // Delete
    public function delete($id);
}
