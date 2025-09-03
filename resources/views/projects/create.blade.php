@extends('layouts.app')

@section('title', 'Create Projects')

@section('content')
    <div class="max-w max-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Create Projects</h2>
        <x-projects.form :action="route('projects.store')" method="POST" />
    </div>
@endsection
