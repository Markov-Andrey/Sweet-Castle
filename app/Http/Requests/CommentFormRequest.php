<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
{
    /**
     *
     */
    protected function prepareForValidation()
    {
        $this->merge([
            "user_id" => auth("web")->id(),
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth("web")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "text" => ["required", "string"],
            "user_id" => ["required", "exists:users,id"],
        ];
    }
}
