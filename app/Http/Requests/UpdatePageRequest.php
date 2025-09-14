<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        return $this->user()?->can('update', $this->route('page')) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $page = $this->route('page');

        return [
            'locale'           => ['nullable','string','max:8'],
            'name'            => ['required','string','max:180'],
            'excerpt'          => ['nullable','string','max:255'],
            'body'             => ['nullable','string'],
            'template'         => ['nullable','string','max:80'],
            'status'           => ['required', Rule::in(['draft','published','archived'])],
            'published_at'     => ['nullable','date'],

            'meta_title'       => ['nullable','string','max:180'],
            'meta_description' => ['nullable','string','max:255'],
            'meta_keywords'    => ['nullable','array'],
            'meta_keywords.*'  => ['string','max:40'],
            'meta_robots'      => ['nullable','string','max:50'],
            'canonical_url'    => ['nullable','url','max:255'],

            'og_title'         => ['nullable','string','max:180'],
            'og_description'   => ['nullable','string','max:255'],
            'og_image_path'    => ['nullable','string','max:255'],
            'twitter_card'     => ['nullable','string','in:summary,summary_large_image'],
            'schema_json'      => ['nullable','array'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->filled('slug') ? str($this->slug)->slug()->toString() : null,
        ]);
    }
}
