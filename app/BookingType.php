<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingType extends Model
{
    protected $table    = 'booking_types'; // name of table in the database
    protected $guarded  = ['id']; // 
    protected $fillable = ['label', 'online_plateform_id']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use

    public function bookings() {
      return $this->hasMany('App\Booking');
    }

    public function onlinePlateform() {
      return $this->belongsTo('App\OnlinePlateform');
    }
}
