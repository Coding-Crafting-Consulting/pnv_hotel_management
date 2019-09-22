<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlinePlateformRequest extends FormRequest
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
            'label' => 'required|unique:online_plateforms,label,'.$this->get('id')
        ];
    }

    public function messages()
    {
        return [
          'label.required' => 'The plateform name is required',
          'label.unique' => 'This online plateform already exists'
        ];
    }
}
