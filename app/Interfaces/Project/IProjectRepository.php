<?php

namespace App\Interfaces\Project;

use Illuminate\Support\Collection;

interface IProjectRepository
{
    public function getWithTasksCount(): Collection;
}
