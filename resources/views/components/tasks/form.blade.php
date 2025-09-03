@props(['task' => null, 'projectsForSelect' => [], 'action', 'method' => 'POST'])

<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-800 mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $task->name ?? '') }}"
               class="w-full border rounded-md px-3 py-2 @error('name') border-red-600 @enderror">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-800 mb-2">Priority</label>
        <input type="number" name="priority" value="{{ old('priority', $task->priority ?? '') }}"
               class="w-full border rounded-md px-3 py-2 @error('priority') border-red-600 @enderror">
        @error('priority')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-800 mb-2">Description</label>
        <textarea name="description" rows="6" class="w-full border rounded-md px-3 py-2">{{ old('description', $task->description ?? '') }}</textarea>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-800 mb-2">Project</label>
        <select name="project_id" class="w-full border rounded-md px-3 py-2">
            <option value="">No Project</option>
            @foreach($projectsForSelect as $id => $name)
                <option value="{{ $id }}"
                    {{ old('project_id', $task->project_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('tasks.index') }}"
           class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-md">
            Cancel
        </a>
        <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-800 rounded-md">
            {{ $method === 'PUT' ? 'Update' : 'Create' }}
        </button>
    </div>
</form>
