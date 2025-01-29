<?php

namespace App\Repositories\Back\Members;

use App\Repositories\Back\Members\IMemberRepository;
use App\Models\Member;

class MemberRepository implements IMemberRepository
{
    protected $model;
    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function all()
    {
        $members = $this->model->orderBy('id', 'desc')->get();
        return $members;
    }

    public function find(int $id): Member
    {
        $member = $this->model->findOrFail($id);
        return $member;
    }

    public function create(array $data): Member
    {
        $member = $this->model->create($data);
        return $member;
    }

    public function update(int $id, array $data): Member
    {
        $member = $this->find($id);
        $member->update($data);
        return $member;
    }

    public function delete(int $id)
    {
        $member = $this->find($id);
        $member->delete();
    }

}
