<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types'; // name of table in the database
    protected $guarded = ['id']; // fields in the table
    protected $fillable = ['label']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use

    public function users(){ // 
    	return $this->hasMany('App\User');
    }
}
