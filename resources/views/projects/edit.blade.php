@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="max-w max-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Project</h2>
        <x-projects.form :project="$project" :action="route('projects.update', $project->id)" method="PUT" />
    </div>
@endsection
