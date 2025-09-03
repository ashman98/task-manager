<?php

namespace App\Models\Task;

use App\Models\Base\BaseModel;
use App\Models\Task\Traits\TaskRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends BaseModel
{
    use HasFactory;
    use TaskRelationsTrait;

    protected $fillable = [
        'name',
        'priority',
        'description',
        'project_id',
    ];

    protected $casts = [
        'project_id' => 'integer'
    ];
}
