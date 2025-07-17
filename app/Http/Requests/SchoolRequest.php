<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
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
        $school = $this->school->id ?? '';

        return [
            'name' => 'required|string|max:255|' . Rule::unique('schools')->ignore($school),
            'description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'founding_year' => 'nullable|digits:4|integer|min:1800|max:'.date('Y'),
            'is_accredited' => 'boolean',
            'accreditation_body' => 'nullable|string|max:255',
            'website_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'accepts_foreign_students' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
