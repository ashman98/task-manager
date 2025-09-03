<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'priority' => 'required|numeric',
            'description' => 'nullable|string',
            'project_id' => 'nullable|integer|exists:projects,id'
        ];
    }
}
