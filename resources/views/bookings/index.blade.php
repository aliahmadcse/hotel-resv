@extends('layouts.app')

@section('buttons')
  
  <a href="{{route('bookings.create')}}" class="btn btn-primary" role="button">
        Add New Booking</a>

@endsection


@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Room</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reservation?</th>
            <th>Paid?</th>
            <th>Started?</th>
            <th>Passed?</th>
            <th>Created</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->room_id }}</td>
                <td>{{ date('F d, Y', strtotime($booking->start)) }}</td>
                <td>{{ date('F d, Y', strtotime($booking->end)) }}</td>
                <td>{{ $booking->is_reservation ? 'Yes' : 'No' }}</td>
                <td>{{ $booking->is_paid ? 'Yes' : 'No' }}</td>
                <td>{{ (strtotime($booking->start) < time()) ? 'Yes' : 'No' }}</td>
                <td>{{ (strtotime($booking->end) < time()) ? 'Yes' : 'No' }}</td>
                <td>{{ date('F d, Y', strtotime($booking->created_at)) }}</td>
                <td class="actions">
                    <a
                        href="{{ action('BookingController@show', ['booking' => $booking->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ action('BookingController@edit', ['booking' => $booking->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection