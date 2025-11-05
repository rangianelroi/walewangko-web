<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUmkmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Izinkan admin
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:umkms,name'],
            'kategori' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'deskripsi' => ['required', 'string', 'max:65535'],
            'kisaran_harga' => ['nullable', 'string', 'max:255'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'galeri_foto' => ['nullable', 'array'], // Untuk input file multiple
            'galeri_foto.*' => ['image', 'mimes:png,jpg,jpeg'] // Validasi setiap file
        ];
    }
}
