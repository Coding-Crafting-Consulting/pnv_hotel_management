<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomSize extends Model
{
    protected $table = 'room_sizes'; // name of table in the database
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['label']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use

    public function rooms(){ // ten model cua bang 
    	return $this->hasMany('App\Room'); // quan he 1 nhieu voi bang product
    }
}
