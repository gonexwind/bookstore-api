<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:authors|max:255'
        ];
    }

    public function authorize()
    {
        return true;
    }
}