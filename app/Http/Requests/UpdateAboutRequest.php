<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // <-- 1. IMPORT RULE

class UpdateAboutRequest extends FormRequest
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
        // 2. Buat variabel untuk 'type'
        $type = $this->input('type');

        return [
             'name' => ['required', 'string', 'max:255'],
             'type' => ['required', 'string', 'max:255'],
             'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
             
             // 3. Buat 'content' wajib HANYA JIKA type adalah 'Sejarah'
             'content' => [
                Rule::requiredIf($type == 'Sejarah'),
                'nullable',
                'string',
            ],
            
            // 4. Buat 'keypoints' wajib HANYA JIKA type adalah 'Visions' or 'Missions'
            'keypoints.*' => [
                Rule::requiredIf($type == 'Visi' || $type == 'Misi'),
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}