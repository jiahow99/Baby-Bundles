<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()){
            return true;
        }else{
            return route('login')
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:8|max:255',
            'price' => 'required|numeric|between:0,999999999.99',
            'description' => 'nullable',
            'category' => 'required|in:top,bottom,outfit,shoes',
            'image' => 'file|required|mimes:jpeg,jfif,png'
        ];
    }
}
