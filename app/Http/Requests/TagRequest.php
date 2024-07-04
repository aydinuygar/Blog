<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Herkesin etiket oluşturmasına izin veriyoruz, gerekirse bu metodu kontrol edebilirsiniz
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:tags',
        ];
    }
}