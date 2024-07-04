<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Herkesin formu gönderebilmesine izin vermek istiyorsanız true döndürün
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required',
        ];
    }
}
