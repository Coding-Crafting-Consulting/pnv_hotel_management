<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes'; // name of table in the database
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['dish_type_id', 'name', 'image', 'price', 'description', 'is_available']; // fields in the table
    
    public $timestamps=true; // set timestamp, allow to use
    
    public $rules = [
        'image' => 'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048'
      ];

    public $messages = [
        'image.image'   =>  'Only .jpeg, .jpg, .png, .gif, .bmp and .svg files are allowed',
        'image.mimes'   =>  'Only .jpeg, .jpg, .png, .gif, .bmp and .svg files are allowed',
        'image.max'    =>  'Picture is too big'
      ];

    public function dishType() {
    	return $this->belongsTo('App\DishType');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
