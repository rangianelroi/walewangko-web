<?php

// app/Http/Requests/UpdateBeritaRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Import Rule

class UpdateBeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan admin untuk update
    }

    public function rules(): array
    {
        // $this->berita mengacu pada ID berita dari route
        return [
            'judul' => ['required', 'string', 'max:255', Rule::unique('beritas')->ignore($this->berita)],
            'ringkasan' => ['required', 'string', 'max:500'],
            'isi_konten' => ['required', 'string'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'], // 'sometimes' = tidak wajib
        ];
    }
}