<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            "id" => "numeric",
            "title" => "required",
            "image" => "file|nullable",
            "snippet" => "required",
            "content" => "required|array",
            "user_id" => "numeric",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "content" => json_decode($this->get('content'), true)
        ]);
    }
}
