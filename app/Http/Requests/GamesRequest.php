<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GamesRequest extends Request
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
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'email' => 'required|max:100',
            'description' => 'required',
            'image' => 'required',
        ];
    }
    public function messages() {
        return [
            'image.required' => 'Please add cover!',
            // 'email.unique' => 'Email already taken!',
        ];
    }
}
