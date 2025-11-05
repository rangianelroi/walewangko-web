<?php

// app/Http/Requests/StoreBeritaRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan admin untuk membuat
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255', 'unique:beritas,judul'],
            'ringkasan' => ['required', 'string', 'max:500'],
            'isi_konten' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            // slug dan user_id akan kita atur di controller
        ];
    }
}