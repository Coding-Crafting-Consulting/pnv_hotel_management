<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users'; // name of table in the database
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['user_type_id', 'title_id', 'first_name', 'middle_name', 'last_name', 'user_name', 'date_of_birth', 'password', 'address', 'email', 'phone', 'country_id', 'identification_type_id', 'identification_number', 'information']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use


    public $messages = [
        'password.required'   =>  'Please enter password',
        'password.min'        =>  'Password must have at least 8 characters',
        'password.max'        =>  'Password must not have more than 20 characters',
        'password.confirmed'  =>  'Password and password confirmation do not match'
      ];


    public function rules()
    {
      return [
        'password'  =>  'required|min:8|max:20|confirmed'
      ];
    }


    public function bookings() {
      return $this->hasMany('App\Booking');
    }

    public function companies() {
      return $this->belongsToMany('App\Company', 'users_companies', 'user_id', 'company_id');
    }

    public function country() {
      return $this->belongsTo('App\Country');
    }

    public function identificationType() {
      return $this->belongsTo('App\IdentificationType');
    }
    
    public function title() {
      return $this->belongsTo('App\Title');
    }

    public function userType() {
      return $this->belongsTo('App\UserType');
    }

    public function vipCard() {
      return $this->hasOne('App\VipCard');
    }

    public function userBills() {
      return $this->hasMany('App\Bill', 'user_id', 'id');
    }

    public function cashierBills() {
      return $this->hasMany('App\Bill', 'cashier_id', 'id');
    }

    public function hasAdminRights() {
      // if user is manager or director
      return in_array($this['user_type_id'], [3, 7]);
    }

    public function fullName() {
      return $this->middle_name ?
          $this->title->label." ".$this->first_name." ".$this->middle_name." ".$this->last_name :
          $this->title->label." ".$this->first_name." ".$this->last_name;
    }
}
