<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:250',
            'content' => 'required',
            'status' => 'required',
            'author' => 'nullable|min:3|max:200',
            'description' => 'nullable|min:3',
            'category_id' => 'required|integer',
            /*'callout' => '',
            'subtitle' => '',
            'address' => '',
            */

        ];
    }
}
