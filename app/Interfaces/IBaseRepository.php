<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IBaseRepository
{
    public function create(array $data): Model;

    public function insert(array $data): bool;

    public function find(int $id, array $with = [], bool $throw = true): Model;
    public function all(): Collection;

    public function get(?array $columns = null): Collection;

    public function getWith(array $with = []): Collection;

    public function destroy(int|string $id): int;

    public function getPlucked(string $field): array;
}
