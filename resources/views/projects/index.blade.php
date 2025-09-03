@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div class="flex justify-start">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a href="{{ route('tasks.index') }}"><i class="fas fa-list mr-2"></i>Tasks</a>
                </h2>
                <h2 class="text-2xl font-bold mx-2 text-gray-800">
                    |
                </h2>
                <h2 class="text-2xl font-bold text-gray-400 cursor-not-allowed">
                    Projects <i class="fa-solid fa-diagram-project"></i>
                </h2>
            </div>
            <a href="{{ route('projects.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i> Add Projects
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm">
            @if($projects->count() > 0)
                <div id="projects-container">
                    @foreach($projects as $project)
                        <div class="project-item p-4 hover:bg-gray-50 border-b border-gray-200 last:border-b-0"
                             data-id="{{ $project->id }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="text-gray-400">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-900">{{ $project->name }}</h3>
                                        @if($project->description)
                                            <p class="text-sm text-gray-600 mt-1">{{ $project->description }}</p>
                                        @endif
                                        <p class="text-xs text-gray-400 mt-2">
                                            Created: {{ $project->created_at->format('M j, Y g:i A') }}
                                            @if($project->updated_at != $project->created_at)
                                                | Updated: {{ $project->updated_at->format('M j, Y g:i A') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                       class="text-blue-600 hover:text-blue-800 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('projects.destroy', $project) }}" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this project?')">
                                        @csrf
                                        @method('DELETE')
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
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No projects found</h3>
                    <p class="text-gray-600">Get started by creating your first project!</p>
                </div>
            @endif
        </div>
    </div>
@endsection
