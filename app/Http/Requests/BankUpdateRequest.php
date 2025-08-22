<?php

namespace App\Http\Requests;

use App\Enums\BankCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BankUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('bank.update') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
    }

    public function rules(): array
    {
        $bankId = $this->route('bank')?->id ?? null;

        return [
            'name'                 => ['sometimes','required','string','max:255'],
            'slug'                 => ['sometimes','required','string','max:255', Rule::unique('banks','slug')->ignore($bankId)],
            'logo_path'            => ['nullable','string','max:255'],
            'website_url'          => ['nullable','url','max:255'],
            'email'                => ['nullable','email','max:255'],
            'phone'                => ['nullable','string','max:50'],
            'country_code'         => ['sometimes','required','string','size:2'],
            'swift_bic'            => ['nullable','string','max:50'],
            'regulatory_license'   => ['nullable','string','max:100'],
            'headquarters_location'=> ['nullable','string','max:255'],
            'established_year'     => ['nullable','integer','digits:4','min:1800','max:'.(int)date('Y')],
            'category'             => ['sometimes','required', Rule::enum(BankCategory::class)],
            'is_active'            => ['boolean'],
            'description'          => ['nullable','string'],
            'metadata'             => ['nullable','array'],
        ];
    }
}
