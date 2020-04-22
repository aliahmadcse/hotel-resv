<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource using eager loading
     * relationship.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::with(['room','room.roomType','users:name'])
        ->paginate(2);
        return view('bookings.index')->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=DB::table('users')->get()->pluck('name','id')
                ->prepend('none');
        $rooms=DB::table('rooms')->get()->pluck('number','id');
        return view('bookings.create')
                ->with('users',$users)
                ->with('booking',( new Booking() ))
                ->with('rooms',$rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking=Booking::create($request->input());
        DB::table('bookings_users')->insert([
            'booking_id'=>$booking->id,
            'user_id'=>$request->input('user_id')
        ]);

        return redirect()->action('BookingController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show')->with('booking',$booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $users=DB::table('users')->get()->pluck('name','id')
                ->prepend('none');
        $rooms=DB::table('rooms')->get()->pluck('number','id');
        $bookingsUser=DB::table('bookings_users')->where('booking_id',
                    $booking->id)->first();
        return view('bookings.edit')
                ->with('users',$users)
                ->with('bookingsUser',$bookingsUser)
                ->with('rooms',$rooms)
                ->with('booking',$booking);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->fill($request->input());
        $booking->save();

        DB::table('bookings_users')
        ->where('booking_id',$booking->id)
        ->update([
            'user_id'=>$request->input('user_id')
        ]);

        return redirect()->action('BookingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        DB::table('bookings_users')
            ->where('booking_id',$booking->id)
            ->delete();
        $booking->delete();
        return redirect()->action('BookingController@index');
    }
}
