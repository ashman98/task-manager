<?php

namespace App\Interfaces\Task;

interface ITaskRepository
{
    public function getByProjectId(int $projectId);
    public function getOrderByPriority();
}
