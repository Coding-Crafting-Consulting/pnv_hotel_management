<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
          'room_size_id'  =>  'required',
          'number'        =>  'required|unique:rooms,number,'.$this->get('id'),
          'price'         =>  'required',
          'beds'           =>  'required'
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
          'room_size_id.required' =>  'The room size is required',
          'number.required'       =>  'The room number is required',
          'price.required'        =>  'The price is required',
          'beds.required'          =>  'The quantity of beds is required',
          'number.unique'         =>  'This number already exists'
        ];
    }
}
