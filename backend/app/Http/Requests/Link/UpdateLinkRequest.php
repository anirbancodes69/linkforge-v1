<?php

namespace App\Http\Requests\Link;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /** @var Link $link */
        $link = $this->route('link');

        return [

            'original_url' => [
                'required',
                'max:2048',
                'url:http,https',
            ],

            'custom_alias' => [
                'nullable',
                'regex:/^[A-Za-z0-9_-]+$/',
                'min:3',
                'max:50',
                'unique:links,custom_alias,' . $link->id,
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'custom_alias.regex' =>
            'Alias may only contain letters, numbers, hyphens (-), and underscores (_).',

        ];
    }
}
