<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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

        $products = $this->route('product');

        return [
            "name" => [
                'required',
                'min:3',
                'max:255',
                'string',
                Rule::unique('products', 'name')->ignore($products)
            ],
            "category_id" => ['required', 'integer', 'exists:categories,id'],
            "description" => ['nullable', 'string'],
            "price" => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            "quantity" => ['required', 'integer', 'min:0'],
            "minimum_stock" => ['required', 'integer', 'min:0'],

        ];
    }
}
