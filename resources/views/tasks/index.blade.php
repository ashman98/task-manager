@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div class="flex justify-start">
                <h2 class="text-2xl font-bold text-gray-400 cursor-not-allowed">
                    <i class="fas fa-list mr-2"></i>Tasks
                </h2>
                <h2 class="text-2xl font-bold mx-2 text-gray-800">
                    |
                </h2>
                <h2 class="text-2xl font-bold text-gray-800">
                    <a href="{{ route('projects.index') }}">Projects <i class="fa-solid fa-diagram-project"></i></a>
                </h2>
            </div>
            <a href="{{ route('tasks.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i> Add Task
            </a>
        </div>

        <div class="mb-6 bg-white rounded-lg shadow-sm p-4">
            <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center space-x-4">
                <label class="text-sm font-medium text-gray-700">Filter by Project:</label>
                <select name="project_id" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Projects</option>
                    @foreach($projectsForSelect as $id => $name)
                        <option value="{{ $id }}" {{ $selectedProjectId == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @if($selectedProjectId)
                    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800 text-sm transition-colors">
                        <i class="fas fa-times mr-1"></i>Clear Filter
                    </a>
                @endif
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-sm">
            @if($tasks->count() > 0)
                <div id="tasks-container">
                    @foreach($tasks as $task)
                        <div class="task-item p-4 hover:bg-gray-50 cursor-move border-b border-gray-200 last:border-b-0"
                             data-id="{{ $task->id }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="text-gray-400">
                                        <i class="fas fa-grip-vertical"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                        <span class="priority-badge bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            #{{ $task->priority }}
                                        </span>
                                            @if($task->project)
                                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">
                                                {{ $task->project->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <h3 class="font-medium text-gray-900">{{ $task->name }}</h3>
                                        @if($task->description)
                                            <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                                        @endif
                                        <p class="text-xs text-gray-400 mt-2">
                                            Created: {{ $task->created_at->format('M j, Y g:i A') }}
                                            @if($task->updated_at != $task->created_at)
                                                | Updated: {{ $task->updated_at->format('M j, Y g:i A') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="project_id" value="{{ $selectedProjectId }}">
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-clipboard-list text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No tasks found</h3>
                    <p class="text-gray-600">Get started by creating your first task!</p>
                </div>
            @endif
        </div>
    </div>
@endsection
