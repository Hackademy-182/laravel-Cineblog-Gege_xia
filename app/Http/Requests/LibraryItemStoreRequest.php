<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'in:anime,serie,film'],
            'title' => ['required', 'string', 'max:150'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'duration' => ['required', 'integer', 'min:1', 'max:600'],
            'genres' => ['required', 'array', 'min:1'],
            'genres.*' => ['integer', 'exists:genres,id'],
            'poster' => ['required', 'image', 'max:2048'],
            'description' => ['required', 'string', 'min:20'],
            'confirm' => ['required', 'accepted'],
        ];
    }
}
