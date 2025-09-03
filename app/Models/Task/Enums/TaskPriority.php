<?php

namespace App\Models\Task\Enums;

enum TaskPriority: int
{
    case Low = 1;
    case Medium = 2;
    case High = 3;
}
