<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
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
            'name' => 'required|max:80',
            'type' => 'required|max:80',
            'balance' => 'required|numeric|max:80',
            'accountNumber' => 'required|numeric|max:80',
            'iban' => 'nullable|max:80',
            'swift' => 'nullable|max:80',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'type' => 'Tipo',
            'balance' => 'Balance',
            'accountNumber' => 'Numero de Cuenta',
            'iban' => 'Numero Iban',
            'swift' => 'Swift',
        ];
    }
}
