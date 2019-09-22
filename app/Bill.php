<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills'; // name of the table in the database
    protected $guarded = ['id','user_id','booking_id','cashier_id']; // fields of the table
    public $timestamps=true; // set timestamp, allow to use

    public function booking() {
      return $this->belongsTo('App\Booking');
    }

    public function orders() {
      return $this->hasMany('App\Order');
    }

    public function cashier()
    {
      return $this->belongsTo('App\User', 'cashier_id', 'id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
