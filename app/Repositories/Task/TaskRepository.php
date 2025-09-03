<?php

namespace App\Repositories\Task;

use App\Interfaces\Task\ITaskRepository;
use App\Models\Task\Task;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository extends BaseRepository implements ITaskRepository
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function getByProjectId($projectId)
    {
        return $this->model->where('project_id', $projectId)
            ->with('project')
            ->orderBy('priority')
            ->get();
    }

    public function getOrderByPriority(): Collection
    {
        return $this->model->with('project')->orderBy('priority')->get();
    }
}
