<?php

namespace App\Repositories\Both;

use App\Repositories\Both\IModelRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ModelRepository implements IModelRepository
{
    protected $model;

    // Inject the model in the constructor
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all records with the most recent first
    public function all(): Collection
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    // Find a record by ID or throw an exception if not found
    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    // Create a new record
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    // Update an existing record by ID
    public function update(int $id, array $data): Model
    {
        $modelInstance = $this->find($id); // Retrieve the existing model
        $modelInstance->update($data);     // Update with new data
        return $modelInstance;
    }

    // Delete a record by ID
    public function delete(int $id): void
    {
        $modelInstance = $this->find($id); // Find the model to delete
        $modelInstance->delete();          // Delete the model
    }
}
