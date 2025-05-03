<?php

namespace App\Http\Requests;

use App\Traits\RequestHasJsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    use RequestHasJsonResponse;
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
            'email' => 'email|required',
            'password' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'email.email' => 'E-mail deve ser válido',
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatório'
        ];
    }
}
