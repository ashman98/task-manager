<?php

use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::put('/tasks/reorder', [TaskController::class, 'tasksReorder'])->name('tasks.reorder');

Route::resource('tasks', TaskController::class);
Route::resource('projects', ProjectController::class);

