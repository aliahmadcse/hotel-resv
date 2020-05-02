<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource using eager loading
     * relationship.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::with(['room', 'room.roomType', 'users:name'])
            ->paginate(2);
        return view('bookings.index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->pluck('name', 'id')
            ->prepend('none');
        $rooms = Room::get()->pluck('number', 'id');
        return view('bookings.create')
            ->with('users', $users)
            // ->with('booking', (new Booking()))
            ->with('rooms', $rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = Booking::create($request->input());
        $booking->users()->attach($request->input('user_id'));

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
        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $users = User::get()->pluck('name', 'id')
            ->prepend('none');
        $rooms = Room::get()->pluck('number', 'id');
        $bookingsUser = DB::table('bookings_users')
            ->where('booking_id', $booking->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('bookings.edit')
            ->with('users', $users)
            ->with('bookingsUser', $bookingsUser)
            ->with('rooms', $rooms)
            ->with('booking', $booking);
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
        (\App\Jobs\ProcessBookingJob::dispatch($booking));
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'start' => 'required|date',
            'end' => 'required|date',
            'is_paid' => 'nullable',
            'notes' => 'present',
            'is_reservation' => 'required'
        ]);
        $booking->fill([
            'room_id' => $validatedData['room_id'],
            'user_id' => $validatedData['user_id'],
            'start' => $validatedData['start'],
            'end' => $validatedData['end'],
            'is_paid' => $validatedData['is_paid'] ?? 0,
            'notes' => $validatedData['notes'],
            'is_reservation' => $validatedData['is_reservation']
        ]);
        $booking->save();
        $booking->users()->sync($validatedData['user_id']);

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
        $booking->users()->detach();
        $booking->delete();
        return redirect()->action('BookingController@index');
    }
}
