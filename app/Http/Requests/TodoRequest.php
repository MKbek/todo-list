<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|in:on,off',
            'important' => 'nullable|in:on,off',
            'reminder_at' => 'nullable|date',
            'marked' => 'nullable|in:on,off',
        ];

        if ($this->method() === 'PUT') {
            $rules['title'] = 'nullable|string|max:255';
            $rules['description'] = 'nullable|string';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.string' => 'A title is not a string',
            'title.max' => 'A title is too long',
            'description.required' => 'A description is required',
            'description.string' => 'A description is not a string',
            'completed.required' => 'A completed is required',
            'important.required' => 'A important is required',
            'reminder_at.date' => 'A reminder_at is not a date',
            'marked.required' => 'A marked is required',
        ];
    }
}
