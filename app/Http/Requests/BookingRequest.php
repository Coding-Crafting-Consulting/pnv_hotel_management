<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booking_type_id'        =>'required',
            'user_id'                =>'required',
            'room_id'                => 'required',
            'entry_date'             => 'required|date|before_or_equal:exit_date',
            'exit_date'              => 'required',
            'booking_purpose_id'     => 'required'    
        ];
    }

    public function messages (){
        return[
            'booking_type_id.required'           =>'Please tell how you make a reservation',
            'entry_date.required'              =>'Please choose entry date',
            'exit_date.required'          =>'Please choose exit date',
            'booking_purpose_id.required'                  =>'choose booking purpose',
            'room_id.unique'                    =>'Room has already been booked'
        ];
    }
}
