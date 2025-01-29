<?php

namespace App\Repositories\Back\Members;

use App\Models\Member;

interface IMemberRepository
{
    public function all();
    public function create(Array $data):Member;
    public function find(int $id):Member;
    public function update(int $id,Array $data):Member;
    public function delete(int $id);
}
