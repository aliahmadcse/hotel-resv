@extends('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('bookings.store') }}" method="POST">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="room_id">Room</label>
        <div class="col-sm-10">
            <select name="room_id" class="form-control" id="room_id" required>
                @foreach($rooms as $id => $display)
                    <option value="{{ $id }}">{{ $display }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">The room number being booked.</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="user_id">User</label>
        <div class="col-sm-10">
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $id => $display)
                    <option value="{{ $id }}">{{ $display }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">The user booking the room.</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="start">Start Date</label>
        <div class="col-sm-10">
            <input name="start" type="date" class="form-control" required placeholder="yyyy-mm-dd"/>
            <small class="form-text text-muted">The start date for the booking.</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="start">End Date</label>
        <div class="col-sm-10">
            <input name="end" type="date" class="form-control" required placeholder="yyyy-mm-dd"/>
            <small class="form-text text-muted">The end date for the booking.</small>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2">Paid Options</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input name="is_paid" type="checkbox" class="form-check-input" value="1"/>
                <label class="form-check-label" for="start">Pre-Paid</label>
                <small class="form-text text-muted">If the booking is being pre-paid.</small>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="notes">Notes</label>
        <div class="col-sm-10">
            <input name="notes" type="text" class="form-control" placeholder="Notes"/>
            <small class="form-text text-muted">Any notes for the booking.</small>
        </div>
    </div>

    <input type="hidden" name="is_reservation" value="1"/>

    @csrf

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Add Reservation</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection