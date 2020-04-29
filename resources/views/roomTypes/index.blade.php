@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Created</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roomTypes as $roomType)
        <tr>
            <td>{{ $roomType->id }}</td>
            <td>{{ $roomType->name }}</td>
            <td>{{ $roomType->description }}</td>
            <td>
                @if ($roomType->picture)
                <img width="50px" src="@php echo Illuminate\Support\Facades\Storage::url($roomType->picture) @endphp"
                    alt="">
                @endif
            </td>
            <td>{{ date('F d, Y', strtotime($roomType->created_at)) }}</td>
            <td class="actions">
                <a href="{{ action('RoomTypeController@edit', ['room_type' => $roomType->id]) }}" alt="Edit"
                    title="Edit">
                    Edit
                </a>
            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
{{ $roomTypes->links() }}
@endsection