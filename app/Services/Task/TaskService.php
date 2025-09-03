<?php

namespace App\Services\Task;

use App\Interfaces\Task\ITaskRepository;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class TaskService extends BaseService
{
    public function __construct(
        ITaskRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function getWithProject(int $projectId): Collection
    {
        return $projectId ? $this->repository->getByProjectId($projectId) : $this->repository->getOrderByPriority();
    }

    public function reorder($priorities): void
    {
        foreach ($priorities as $taskId => $priority) {
            $this->repository->update($taskId, ['priority' => $priority]);
        }
    }
}
