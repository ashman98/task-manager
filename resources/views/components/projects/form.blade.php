@props(['project' => null, 'action', 'method' => 'POST'])

<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-800 mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $project->name ?? '') }}"
               class="w-full border rounded-md px-3 py-2 @error('name') border-red-600 @enderror">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-800 mb-2">Description</label>
        <textarea name="description" rows="8" class="w-full border rounded-md px-3 py-2">{{ old('description', $project->description ?? '' )}}</textarea>
    </div>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('projects.index') }}"
           class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-md">
            Cancel
        </a>
        <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-800 rounded-md">
            {{ $method === 'PUT' ? 'Update' : 'Create' }}
        </button>
    </div>
</form>
