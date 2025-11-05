<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalamKumtuaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan admin
    }

    public function rules(): array
    {
        return [
            'nama_hukum_tua' => ['required', 'string', 'max:255'],
            'pesan' => ['required', 'string'],
            'foto' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'], // 'sometimes' berarti tidak wajib di-upload ulang
        ];
    }
}