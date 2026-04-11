<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "name" => ['required', 'min:3', 'max:255', 'string'],
            "category_id" => ['required', 'integer', 'exists:categories,id'],
            "description" => ['nullable', 'string'],
            "price" => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            "quantity" => ['required', 'integer', 'min:0'],
            "minimum_stock" => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id' => 'A categoria selecionada não existe no nosso sistema.',
        ];
    }
}
