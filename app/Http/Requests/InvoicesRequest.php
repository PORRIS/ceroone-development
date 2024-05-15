<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
            'contactName' => 'required|max:80',
            'notes' => 'nullable|max:80',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
        ];
    }
    public function attributes()
    {
        return [
            'contactName' => 'Nombre',
            'subtotal' => 'Sub Total',
            'total' => 'Total',
        ];
    }
}
