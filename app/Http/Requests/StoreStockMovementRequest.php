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
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'type' => ['required', Rule::in(['entry', 'exit'])],
            'movement_quantity' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'O produto é obrigatório.',
            'type.required' => 'O tipo da movimentação é obrigatório.',
            'type.in' => 'O tipo da movimentação deve ser entrada ou saida.',
            'movement_quantity.required' => 'A quantidade é obrigatória.',
            'movement_quantity.integer' => 'A quantidade deve ser um número inteiro.',
            'movement_quantity.min' => 'A quantidade deve ser maior que zero.',
            'description.string' => 'A descrição deve ser um texto válido.',
        ];
    }
}
