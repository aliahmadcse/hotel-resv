<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

    public function room()
    {
        return $this->hasOne('App\Room');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room','id','room_type_id');
    }

    
}
