@extends('layouts.app')

@section('buttons')

<a href="{{route('bookings.create')}}" class="btn btn-primary" role="button">
    Add New Booking</a>

@endsection


@section('content')
<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>User</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reservation?</th>
            <th>Paid?</th>
            <th>Started?</th>
            <th>Passed?</th>
            <th>Created</th>
            <th class="Actions">Action</th>
            <th class="Actions">Action</th>
            <th class="Actions">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->room->number }}</td>
            <td>{{ $booking->room->roomType->name }}</td>
            <td>{{ $booking->users[0]->name}}</td>
            <td>{{ date('F d, Y', strtotime($booking->start)) }}</td>
            <td>{{ date('F d, Y', strtotime($booking->end)) }}</td>
            <td>{{ $booking->is_reservation ? 'Yes' : 'No' }}</td>
            <td>{{ $booking->is_paid===1 ? 'Yes' : 'No' }}</td>
            <td>{{ (strtotime($booking->start) < time()) ? 'Yes' : 'No' }}</td>
            <td>{{ (strtotime($booking->end) < time()) ? 'Yes' : 'No' }}</td>
            <td>{{ date('F d, Y', strtotime($booking->created_at)) }}</td>
            <td class="actions">
                <a href="{{ action('BookingController@show', ['booking' => $booking->id]) }}" alt="View" title="View">
                    View
                </a>
            </td>
            <td>
                <a href="{{ action('BookingController@edit', ['booking' => $booking->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </td>
            <td>
                <form action="{{ action('BookingController@destroy', ['booking' => $booking->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" title="Delete" value="Delete">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>

<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $bookings->links() }}
    </div>
</div>

@endsection