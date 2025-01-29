<?php

namespace App\Repositories\Back\RMembers;

use App\Repositories\Back\RMembers\IRoleRepository;
use App\Models\RMember;

class RoleRepository implements IRoleRepository
{
    protected $model;
    public function __construct(RMember $RMember)
    {
        $this->model = $RMember;
    }

    public function all()
    {
        $RMembers = $this->model->orderBy('id', 'desc')->get();
        return $RMembers;
    }

    public function find(int $id): RMember
    {
        $RMember = $this->model->findOrFail($id);
        return $RMember;
    }

    public function create(array $data): RMember
    {
        $RMember = $this->model->create($data);
        return $RMember;
    }

    public function update(int $id, array $data): RMember
    {
        $RMember = $this->find($id);
        $RMember->update($data);
        return $RMember;
    }

    public function delete(int $id)
    {
        $RMember = $this->find($id);
        $RMember->delete();
    }
}
