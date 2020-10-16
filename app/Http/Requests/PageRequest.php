<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "string|required",
            "slug" => ["string", "required", Rule::unique('pages')->ignore($this->id)],
            "content" => "array",
            "details" => "array",
        ];
    }

    protected function prepareForValidation(){
        $this->merge([]);
    }
}
