<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShowRoomsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$roomNumber=null)
    {
        $rooms=Room::byNumber($roomNumber)->get();
        return view('rooms.index',['rooms' => $rooms]);
    }
}
