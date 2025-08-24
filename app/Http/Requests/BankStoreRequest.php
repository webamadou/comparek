<?php

namespace App\Http\Requests;

use App\Enums\BankCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BankStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return $this->user()?->can('bank.create') ?? false;
        return true;
    }

    protected function prepareForValidation(): void
    {
        /*if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
        if (!$this->filled('country_code')) {
            $this->merge(['country_code' => 'SN']);
        }*/
    }

    public function rules(): array
    {
        $bank = $this->bank ?? '';

        return [
            'name'                 => ['required','string','max:255', Rule::unique('banks')->ignore($bank)],
            'logo_path'            => ['nullable','string','max:255'],
            'website_url'          => ['nullable','url','max:255'],
            'email'                => ['nullable','email','max:255'],
            'phone'                => ['nullable','string','max:50'],
            'country_code'         => ['required','string','size:2'],
            'swift_bic'            => ['nullable','string','max:50'],
            'regulatory_license'   => ['nullable','string','max:100'],
            'headquarters_location'=> ['nullable','string','max:255'],
            'established_year'     => ['nullable','integer','digits:4','min:1800','max:'.(int)date('Y')],
            'category'             => ['required', Rule::enum(BankCategory::class)],
            'is_active'            => ['boolean'],
            'description'          => ['nullable','string'],
            'metadata'             => ['nullable','array'],
        ];
    }
}
