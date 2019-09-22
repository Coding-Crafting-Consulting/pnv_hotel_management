<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCompany extends Model
{
    protected $table = 'users_companies'; // name of table in the database
    protected $guarded = ['id','user_id','company_id']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use
}
