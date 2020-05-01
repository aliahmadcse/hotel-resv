<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';

    public $timeStamps = true;

    public function scopeByRoomType($query, $roomType = null)
    {
        if (!is_null($roomType)) {
            $query->where('room_type_id', $roomType);
        }
        return $query;
    }

    /**
     * Makes relationship with the RoomType model
     */
    public function roomType()
    {
        return $this->belongsTo('App\RoomType', 'room_type_id', 'id');
    }
}
