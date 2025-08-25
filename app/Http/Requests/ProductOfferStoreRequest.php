<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductOfferStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('product_offer.create') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
    }

    public function rules(): array
    {
        return [
            'bank_product_id'  => ['required','exists:bank_products,id'],
            'name'             => ['required','string','max:255'],
            'slug'             => ['required','string','max:255',
                Rule::unique('product_offers','slug')->where(fn($q) => $q->where('bank_product_id', $this->input('bank_product_id')))],
            'description'      => ['nullable','string'],

            'min_income'       => ['nullable','numeric','min:0'],
            'min_age'          => ['nullable','integer','min:15','max:120'],
            'required_documents'=> ['nullable','array'],
            'required_documents.*'=> ['string','max:100'],
            'eligibility'      => ['nullable','array'],

            'min_term_months'  => ['nullable','integer','min:1','max:600'],
            'max_term_months'  => ['nullable','integer','min:1','max:600','gte:min_term_months'],
            'min_loan_amount'  => ['nullable','numeric','min:0'],
            'max_loan_amount'  => ['nullable','numeric','min:0','gte:min_loan_amount'],

            'effective_from'   => ['nullable','date'],
            'effective_to'     => ['nullable','date','after:effective_from'],

            'is_active'        => ['boolean'],
        ];
    }
}
