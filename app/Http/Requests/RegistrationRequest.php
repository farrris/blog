<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        return [
            "email" => ["required", "email", "unique:users,email"],
            "login" => ["required", "string"],
            "password" => ["required", "string", "min:6", "confirmed"],
            "password_confirmation" => ["required", "string"],
            "avatar" => ["image"]
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Пользователь с такой почтой уже существует',
            'password.min' => 'Пароль должен содержать минимум 6 символов',
        ];
    }
}
