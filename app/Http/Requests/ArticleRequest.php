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
            "image" => "nullable",
            "snippet" => "required",
            "content" => "required|array",
            "category_id" => "numeric|nullable",
            "user_id" => "numeric",
            "published_at" => "date|nullable",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "content" => json_decode($this->get('content'), true),
            "author" => json_decode($this->get('author'), true),
            "published_at" => $this->get('published_at') ?? now(),
        ]);
    }
}
