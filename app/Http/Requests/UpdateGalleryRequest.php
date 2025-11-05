<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65535'],
            'date' => ['required', 'date'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'], // 'sometimes' = tidak wajib saat update
        ];
    }
}