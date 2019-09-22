<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsEquipment extends Model
{
    protected $table = 'rooms_equipments'; // name of table in the database
    protected $guarded = ['id','room_id','equipment_id']; // fields in the table
    public $timestamps=true; // set timestamp, allow to use
    
}
