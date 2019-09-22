<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
          'dish_type_id'  =>  'required',
          'name'          =>  'required|unique:dishes,name,'.$this->get('id')
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'dish_type_id.required'   =>  'The dish category is required',
          'name.required'           =>  'The name of the dish is required',
          'name.unique'             =>  'This dish name has already been taken'
        ];
    }
}
