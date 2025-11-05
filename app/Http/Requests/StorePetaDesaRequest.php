<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetaDesaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan admin
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }
}