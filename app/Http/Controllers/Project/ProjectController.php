<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project\Project;
use App\Services\Project\ProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function __construct(
        ProjectService $service
    )
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $projects = $this->service->getWithTasks();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $this->service->createOrUpdate($request->validated());

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', compact( 'project'));
    }

    public function update(ProjectUpdateRequest $request): RedirectResponse
    {
        $this->service->createOrUpdate($request->validated());

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->service->delete($project->id);
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
