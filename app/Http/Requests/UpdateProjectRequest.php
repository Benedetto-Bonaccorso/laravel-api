<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:5|max:100, Rule::unique('posts')->ignore($this->post->id)",
            "slug" => "nullable",
            "cover_image" => "nullable|image|max:300",
            "author" => "nullable|max:255",
            "deadline" => "nullable",
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages()
    {
        return[
            "title.required" => "A title is required",
            "title.unique" => "This title is already present in your portfolio",
            "title.min" => "A title must contain at least 5 characters",
            "title.max" => "titles have a max of 100 characters",
            "author.max" => "titles have a max of 255 characters",
        ];
    }
}
