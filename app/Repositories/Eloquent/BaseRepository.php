<?php

namespace App\Repositories\Eloquent;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): bool
    {
        $record = $this->findById($id);

        if (! $record) {
            return false;
        }

        return $record->update($data);
    }

    public function delete(string $id): bool
    {
        $record = $this->findById($id);

        if (! $record) {
            return false;
        }

        return $record->delete();
    }
}
