<?php

namespace App\Models\Project\Traits;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ProjectRelationsTrait
{
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderBy('priority');
    }
}
