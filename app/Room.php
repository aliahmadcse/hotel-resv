<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    protected $table='rooms';
    protected $primaryKey='id';

    public $timeStamps=true;

    public function scopeByType($query,$roomTypeId=null)
    {
        if (!is_null($roomTypeId)){
            $query->where('room_type_id',$roomTypeId);
        }
        return $query;
    }

    public function roomType()
    {
        return $this->belongsTo('App\RoomType','room_type_id','id');
    }
}
