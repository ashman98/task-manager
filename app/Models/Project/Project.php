<?php

namespace App\Models\Project;

use App\Models\Base\BaseModel;
use App\Models\Project\Traits\ProjectRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends BaseModel
{
    use HasFactory;
    use ProjectRelationsTrait;

    protected $fillable = [
      'name',
      'description'
    ];
}
