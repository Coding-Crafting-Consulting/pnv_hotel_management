<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  private function commonRules() {

    return [
      'user_type_id'            =>  'required|numeric',
      'title_id'                =>  'required|numeric',
      'first_name'              =>  'required',
      'last_name'               =>  'required',
      'date_of_birth'           =>  'required',
      'address'                 =>  'required',
      'country_id'              =>  'required|numeric',
      'identification_type_id'  =>  'required|numeric'
    ];
  
  }


  private function storeRules() {

    return [
      'email'                   =>  'required|unique:users,email',
      'phone'                   =>  'required|unique:users,phone',
      
      'identification_number'   =>
        'required|unique:users,identification_number'
    ];
  
  }


  private function updateRules() {

    return [
      'email'                   =>
        'required|unique:users,email,'.$this->get('id'),
      
      'phone'                   =>
        'required|unique:users,phone,'.$this->get('id'),
      
      'identification_number'   =>
        'required|unique:users,identification_number,'.$this->get('id')
    ];
  
  }


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
    return (
      array_merge(
        $this->commonRules(),
        $this->get('id') ? $this->updateRules() : $this->storeRules()
      )
    );
  }

  public function messages (){
    return[
        'user_type_id.required'           =>'Please choose user type',
        'title_id.required'               =>'Please choose user title',
        'first_name.required'             =>'Please enter first name',
        'last_name.required'              =>'Please enter last name',
        'date_of_birth.required'          =>'Please enter date of birth',
        'email.required'                  =>'Please enter email',
        'email.unique'                    =>'Email has already been registered',
        'address.required'                =>'Please enter address',
        'phone.required'                  =>'Please enter phone number',
        'phone.unique'                    =>'Phone number has already been registered',
        'country_id.required'             =>'Please choose country!',
        'identification_type_id.required' =>'Please choose identification type',
        'identification_number.required'  =>'Please indicate your identification number',
        'identification_number.unique'    =>'Identification number has already been registered'
    ];
  }
}
