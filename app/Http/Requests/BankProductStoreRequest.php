<?php

namespace App\Http\Requests;

use App\Enums\ProductType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BankProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('bank_product.create') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
        if (!$this->filled('currency')) {
            $this->merge(['currency' => 'XOF']);
        }
    }

    public function rules(): array
    {
        return [
            'bank_id'     => ['required','exists:banks,id'],
            'name'        => ['required','string','max:255'],
            'slug'        => ['required','string','max:255',
                Rule::unique('bank_products','slug')->where(fn($q) => $q->where('bank_id', $this->input('bank_id')))],
            'product_type'=> ['required', Rule::enum(ProductType::class)],
            'currency'    => ['required','string','size:3'],
            'is_active'   => ['boolean'],
            'description' => ['nullable','string'],
        ];
    }
}
