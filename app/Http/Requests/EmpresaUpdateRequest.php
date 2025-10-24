<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaUpdateRequest extends FormRequest
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
