@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9">{{ $booking->id }}</dd>

    <dt class="col-sm-3">Room ID</dt>
    <dd class="col-sm-9">{{ $booking->room_id }}</dd>

    <dt class="col-sm-3">Start Date</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->start)) }}</dd>

    <dt class="col-sm-3">End Date</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->end)) }}</dd>

    <dt class="col-sm-3">Reservation?</dt>
    <dd class="col-sm-9">{{ $booking->is_reservation ? 'Yes' : 'No' }}</dd>

    <dt class="col-sm-3">Paid?</dt>
    <dd class="col-sm-9">{{ $booking->is_paid ? 'Yes' : 'No' }}</dd>

    <dt class="col-sm-3">Notes</dt>
    <dd class="col-sm-9">{{ $booking->room_id }}</dd>

    <dt class="col-sm-3">Created</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->created_at)) }}</dd>

    <dt class="col-sm-3">Updated</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->updated_at)) }}</dd>
</dl>
@endsection