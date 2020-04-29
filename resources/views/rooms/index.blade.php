@extends('layouts.app')

@section('content')

    <table class = "table">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Type</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{$room->number}}</td>
                    <td>{{$room->roomType->name}}</td>
                    <td>{{$room->roomType->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection