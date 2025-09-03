<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\Task\Task;
use App\Services\Project\ProjectService;
use App\Services\Task\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected ProjectService $projectService;

    public function __construct(TaskService $service, ProjectService $projectService)
    {
        $this->service = $service;
        $this->projectService = $projectService;
    }

    public function index(Request $request): View
    {
        $projectsForSelect = $this->projectService->getForSelect();
        $selectedProjectId = $request->get('project_id');
        $tasks = $this->service->getWithProject((int) $selectedProjectId);

        return view('tasks.index', compact('tasks', 'projectsForSelect', 'selectedProjectId'));
    }

    public function create(): View
    {
        $projectsForSelect = $this->projectService->getForSelect();

        return view('tasks.create', compact( 'projectsForSelect'));
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $this->service->createOrUpdate($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    public function edit(Task $task): View
    {
        $projectsForSelect = $this->projectService->getForSelect();

        return view('tasks.edit', compact( 'task', 'projectsForSelect'));
    }

    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $this->service->createOrUpdate($request->validated(), $task->id);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->service->delete($task->id);
        return redirect()->route('tasks.index')
            ->with('success', 'Project deleted successfully!');
    }

    public function tasksReorder(Request $request): JsonResponse
    {
        $priorities = $request->input('priorities', []);
        $this->service->reorder($priorities);

        return  $this->sendSuccess(['status' => 'success']);
    }
}
