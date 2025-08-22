<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductOfferUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('product_offer.update') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
    }

    public function rules(): array
    {
        $offerId        = $this->route('product_offer')?->id ?? null;
        $bankProductId  = $this->input('bank_product_id') ?? $this->route('product_offer')?->bank_product_id;

        return [
            'bank_product_id'  => ['sometimes','required','exists:bank_products,id'],
            'name'             => ['sometimes','required','string','max:255'],
            'slug'             => ['sometimes','required','string','max:255',
                Rule::unique('product_offers','slug')
                    ->ignore($offerId)
                    ->where(fn($q) => $q->where('bank_product_id', $bankProductId))],
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
