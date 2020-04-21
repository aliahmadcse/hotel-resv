<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    protected $table='rooms';
    protected $primaryKey='id';

    public $timeStamps=true;
}
