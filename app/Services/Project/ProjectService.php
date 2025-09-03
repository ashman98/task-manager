<?php

namespace App\Services\Project;

use App\Interfaces\Project\IProjectRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class ProjectService extends BaseService
{

    public function __construct(
        IProjectRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function getWithTasks(): Collection
    {
       return $this->repository->getWith(['tasks']);
    }
}
