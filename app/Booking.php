<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings'; // name of the table in the database
    protected $guarded = ['id'];
     // fields in the table
    protected $fillable = ['booking_type_id','user_id', 'room_id', 'entry_date', 'exit_date', 'booking_purpose_id'];
    public $timestamps=true; // set timestamp, allow to use

    public function bill() {
      return $this->hasOne('App\Bill');
    }

    public function bookingPurpose() {
      return $this->belongsTo('App\BookingPurpose');
    }

    public function bookingType() {
      return $this->belongsTo('App\BookingType');
    }

    public function room() {
      return $this->belongsTo('App\Room');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
