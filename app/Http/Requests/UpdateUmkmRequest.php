<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUmkmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'], // Anda bisa tambahkan Rule::unique ignore
            'kategori' => ['required', 'string', 'max:255'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'], // 'sometimes' untuk update
            'deskripsi' => ['required', 'string', 'max:65535'],
        ];
    }
}
