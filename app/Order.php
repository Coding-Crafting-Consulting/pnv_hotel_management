<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // name of the table in the database
    protected $guarded = ['id','bill_id','dish_id']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use

    public function bill()
    {
    	return $this->belongsTo('App\Bill');
    }

    public function dish()
    {
    	return $this->belongsTo('App\Dish');
    }
}
