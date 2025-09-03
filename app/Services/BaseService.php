<?php

namespace App\Services;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseService
{
    protected IBaseRepository $repository;

    public function createOrUpdate(array $data, ?int $id = null): Model
    {
        return DB::transaction(function () use ($data, $id) {
            return $this->createOrUpdateWithoutTransaction($data, $id);
        });
    }

    public function createOrUpdateWithoutTransaction(array $data, ?int $id = null): Model
    {
        return $id
            ? $this->repository->update($id, $data)
            : $this->repository->create($data);
    }

    public function delete(int $id): void
    {
        $this->repository->destroy($id);
    }

    public function getForSelect(string $field = 'name'): array
    {
        return $this->repository->getPlucked($field);
    }
}
