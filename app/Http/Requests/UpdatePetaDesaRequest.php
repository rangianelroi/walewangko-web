<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetaDesaRequest extends FormRequest
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
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'], // 'sometimes' = tidak wajib saat update
        ];
    }
}