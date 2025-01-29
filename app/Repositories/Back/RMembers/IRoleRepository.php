<?php

namespace App\Repositories\Back\RMembers;

use App\Models\RMember;

interface IRoleRepository
{
    public function all();
    public function create(Array $data):RMember;
    public function find(int $id):RMember;
    public function update(int $id,Array $data):RMember;
    public function delete(int $id);
}
