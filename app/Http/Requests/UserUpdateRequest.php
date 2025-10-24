<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'nome' => 'required|string| max:60',
            'responsavel' => 'required',
            'cnpj' => 'required',
            'cpf' => 'required',
            'telefone_1' => 'required|min:11',
            'cep' => 'required',
            'endereco' => 'required',
            'numero' => 'required|numeric|max:99999',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' =>  'required',
        ];
    }

    public function messages(): array
    {

        return [
                      
            'numero.numeric' => 'Somente números',
            'numero.max' => 'Número pode ter no máximo 5 dígitos',
            'telefone_1.min' => 'Telefone deve ter no mínimo 13 dígitos',
           
        ];
    }
}
