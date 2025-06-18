<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TelecomOperatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('telecom_operator')?->id;
        $tlcOp = $this->telecom_operator->id ?? '';

        return [
            'name' => 'required|string|max:255|' . Rule::unique('telecom_operators')->ignore($tlcOp),
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'headquarters_location' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer|min:1800|max:' . now()->year,
            'is_active' => 'boolean',
        ];
    }
}
