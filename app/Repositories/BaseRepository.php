<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model The model to be used by the repository
     */
    public function __construct(string $model)
    {
        $this->model = $model;  // Store the class name
    }

    /**
     * Fetch all records from the database.
     *
     * @param array $with Relationships to eager load.
     * @return Collection
     */
    public function fetchAll(array $with = [], array $filterable = []): object
    {
        $query = $this->model::query();
    
        if (!empty($with)) {
            $query->with($with);
        }
    
        if (!empty($filterable)) {
            foreach ($filterable as $filter) {
                if (is_array($filter) && count($filter) === 3) {
                    $query->where($filter[0], $filter[1], $filter[2]);
                } elseif (is_array($filter)) {
                    $query->whereIn($filter[0], $filter[1]);
                } else {
                    $query->where(key($filter), current($filter));
                }
            }
        }
    
        return $query->get();
    }

    /**
     * Fetch a single record by ID.
     *
     * @param int $id The ID of the record.
     * @param array $with Relationships to eager load.
     * @return Model|null
     */
    public function fetch(int $id, array $with = []): object
    {
        $query = $this->model::query();

        if (!empty($with)) {
            $query->with($with);
        }

        return $query->find($id);
    }

    /**
     * Store a new record in the database.
     *
     * @param array $data The data to store.
     * @return Model
     */
    public function store(array $data): object
    {
        return $this->model::create($data);
    }

    /**
     * Update an existing record.
     *
     * @param array $data The data to update.
     * @param int $id The ID of the record to update.
     * @return Model
     */
    public function update(array $data, int $id): object
    {
        $record = $this->model::findOrFail($id);
        $record->update($data);

        return $record;
    }

    /**
     * Delete a record by ID.
     *
     * @param int $id The ID of the record to delete.
     * @return bool
     */
    public function delete(int $id): bool
    {
        $record = $this->model::findOrFail($id);

        return $record->delete();
    }
}
