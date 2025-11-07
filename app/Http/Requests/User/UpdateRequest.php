<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Email already exists',
        ];
    }
}
