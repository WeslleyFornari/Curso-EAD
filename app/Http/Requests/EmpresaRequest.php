<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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

        $id = $this->route('id');

        return [
           
            'nome' => 'required|string| max:60',
            'name' => 'required|string',
            'telefone_1' => 'required|min:11',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'string|confirmed|min:4',

        ];
    }

    public function messages(): array
    {

       
        return [
                      
            'telefone_1.min' => 'Telefone deve ter no mínimo 13 dígitos',
            'password.confirmed' => 'Senha não confere'
        ];
    }
}
