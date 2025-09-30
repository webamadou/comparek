<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'is_published' => 'boolean',
            'is_home_page_big_image' => 'integer|nullable|max:2',
            'published_at' => 'nullable|date',
            'schema_json' => 'nullable|json',
            'robots_directives' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
