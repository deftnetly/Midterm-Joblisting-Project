<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var \App\Models\Job|null $job */
        $job = $this->route('job');

        return $job instanceof Job ? $this->user()->can('update', $job) : false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
        ];
    }
}
