<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VipCard extends Model
{
    protected $table = 'vip_cards'; // name of table in the database
    
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['user_id', 'point']; // fields in the table
    
    public $timestamps=true; // set timestamp, allow to use
    
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
