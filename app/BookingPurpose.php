<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPurpose extends Model
{
    protected $table = 'booking_purposes'; // name of table in the database
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['label']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use

    public function bookings(){ 
    	return $this->hasMany('App\Booking'); 
    }
}
