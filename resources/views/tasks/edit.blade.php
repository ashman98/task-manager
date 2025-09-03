@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="max-w max-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Task</h2>
        <x-tasks.form :task="$task" :projectsForSelect="$projectsForSelect" :action="route('tasks.update', $task->id)" method="PUT" />
    </div>
@endsection
