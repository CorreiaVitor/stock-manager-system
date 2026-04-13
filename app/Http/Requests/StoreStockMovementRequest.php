<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStockMovementRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(['entry', 'exit'])],
            'quantity' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'moved_at' => ['nullable', 'date']
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'O tipo da movimentação é obrigatório.',
            'type.in' => 'O tipo da movimentação deve ser entry ou exit.',
            'quantity.required' => 'A quantidade é obrigatória.',
            'quantity.integer' => 'A quantidade deve ser um número inteiro.',
            'quantity.min' => 'A quantidade deve ser maior que zero.',
            'description.string' => 'A descrição deve ser um texto válido.',
            'moved_at.date' => 'A data da movimentação deve ser uma data válida.',
        ];
    }
}
