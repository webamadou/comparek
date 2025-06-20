<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TelecomServiceTypeRequest extends FormRequest
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
        $tlcOp = $this->telecom_service_type->id ?? '';

        return [
            'name' => 'required|string|max:255|' . Rule::unique('telecom_service_types')->ignore($tlcOp),
            'description' => 'nullable|string',
        ];
    }
}
