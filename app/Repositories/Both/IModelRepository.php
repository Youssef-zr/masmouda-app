<?php

namespace App\Repositories\Both;

use Illuminate\Database\Eloquent\Model;

interface IModelRepository
{
    public function all();
    public function create(Array $data):Model;
    public function find(int $id):Model;
    public function update(int $id,Array $data):Model;
    public function delete(int $id);
}
