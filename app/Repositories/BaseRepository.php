<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements IBaseRepository
{
    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Model
    {
        if ($this->model->defaultValues) {
            $data = [...$this->model->defaultValues, ...$data];
        }

        return $this->model->create($data);
    }

    public function insert(array $data): bool
    {
        return $this->model->insert($data);
    }

    public function find(int $id, array $with = [], bool $throw = true): Model
    {
        $model = empty($with) ? $this->model : $this->model::with($with);

        return $throw ? $model->findOrFail($id) : $model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function get(?array $columns = null): Collection
    {
        return $columns ? $this->model->get($columns) : $this->model->get();
    }

    public function getWith(array $with = []): Collection
    {
        return $this->model->with($with)->get();
    }

    public function update(int $id, array $data): Model
    {
        $model = $this->find($id);
        if ($model->defaultValues) {
            $data = [...$model->defaultValues, ...$data];
        }

        $model->update($data);

        return $model->refresh();
    }

    public function destroy(int|string $id): int
    {
        return $this->model->destroy($id);
    }

    public function getPlucked(string $field): array
    {
        return $this->model->pluck($field, 'id')->toArray();
    }
}
