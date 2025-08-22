<?php

namespace App\Http\Requests;

use App\Enums\ProductType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BankProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('bank_product.update') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
    }

    public function rules(): array
    {
        $productId = $this->route('bank_product')?->id ?? null;
        $bankId    = $this->input('bank_id') ?? $this->route('bank_product')?->bank_id;

        return [
            'bank_id'     => ['sometimes','required','exists:banks,id'],
            'name'        => ['sometimes','required','string','max:255'],
            'slug'        => ['sometimes','required','string','max:255',
                Rule::unique('bank_products','slug')
                    ->ignore($productId)
                    ->where(fn($q) => $q->where('bank_id', $bankId))],
            'product_type'=> ['sometimes','required', Rule::enum(ProductType::class)],
            'currency'    => ['sometimes','required','string','size:3'],
            'is_active'   => ['boolean'],
            'description' => ['nullable','string'],
        ];
    }
}
