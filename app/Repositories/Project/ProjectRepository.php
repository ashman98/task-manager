<?php

namespace App\Repositories\Project;

use App\Interfaces\Project\IProjectRepository;
use App\Models\Project\Project;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ProjectRepository extends BaseRepository implements IProjectRepository
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    public function getWithTasksCount(): Collection
    {
        return $this->model->withCount('tasks')->get();
    }
}
