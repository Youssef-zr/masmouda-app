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

        $this->storeFile($member, 'cin_image', 'cin_image');

        return $member;
    }

    public function update(int $id, array $data): Member
    {
        $member = $this->find($id);
        $member->update($data);

        $this->updateFile($member, 'cin_image', 'cin_image');

        return $member;
    }

    public function delete(int $id)
    {
        $member = $this->find($id);
        $member->clearMediaCollection("cin_image");
        $member->delete();
    }

    // store file to media library collection

    public function storeFile(Member $member, $fileName, $collectionName)
    {
        if (request()->has($fileName)) {
            $file = request()->file($fileName);

            $member->addMedia($file)
                ->toMediaCollection(collectionName: $collectionName);
                
            // automatically generate the 'thumb' and 'optimized' versions
            $member->refresh(); // to reload the model and media after it's been saved
        }
    }


    // update file in media library collection

    public function updateFile(Member $member, $fileName, $collectionName)
    {
        if (request()->has($fileName)) {
            $file = request()->file($fileName);

            $member->clearMediaCollection(collectionName: $collectionName);
            $member->addMedia($file)
                ->toMediaCollection(collectionName: $collectionName);

            // automatically generate the 'thumb' and 'optimized' versions
            $member->refresh(); // to reload the model and media after it's been saved
        }
    }
}
