<?php

namespace App\Http\Requests;

use App\Enums\LanguageEnum;
use App\Enums\ProgramLevelEnum;
use App\Enums\ProgramModalityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SchoolProgramRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'school_id' => ['required', 'exists:schools,id'],
            /*'program_domain_id' => ['required', 'exists:program_domains,id'],*/
            'domain_ids' => ['required', 'array'],
            'domain_ids.*' => ['integer', 'exists:program_domains,id'],
            'level' => ['required', new Enum(ProgramLevelEnum::class)],
            'duration_years' => ['nullable', 'integer', 'min:1', 'max:8'],
            'modality' => ['nullable', new Enum(ProgramModalityEnum::class)],
            'language' => ['nullable', new Enum(LanguageEnum::class)],
            'is_accredited' => ['nullable', 'boolean'],
            'tuition_fee' => ['nullable', 'integer', 'min:0'],
            'registration_fee' => ['nullable', 'numeric', 'min:0'],
            'tuition_currency' => ['nullable', 'in:FCFA,EUR,USD'],
            'tuition_description' => ['nullable', 'string', 'max:255'],
            'accreditation_ids' => ['nullable', 'array'],
            'accreditation_ids.*' => ['integer', 'exists:accreditation_bodies,id'],
            'feature_ids' => ['nullable', 'array'],
            'feature_ids.*' => ['integer', 'exists:program_features,id'],
        ];
    }
}
