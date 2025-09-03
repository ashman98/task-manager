<?php

namespace App\Models\Task\Traits;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait TaskRelationsTrait
{
    public function project(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
