@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="max-w max-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Create Task</h2>
        <x-tasks.form :projectsForSelect="$projectsForSelect" :action="route('tasks.store')" method="POST" />
    </div>
@endsection
