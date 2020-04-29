@extends('layouts.app')

@section('content')
<div class="col">
    <form action="{{ route('room_types.update', ['room_type' => $roomType]) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" required value="{{ $roomType->name ?? '' }}" />
                <small class="form-text text-muted">The room type name.</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">Description</label>
            <div class="col-sm-10">
                <input name="description" type="text" class="form-control" required
                    value="{{ $roomType->description ?? '' }}" />
                <small class="form-text text-muted">The room type description.</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">Choose Picture</label>
            <div class="custom-file col-sm-10">
                <label class="custom-file-label" for="picture">Picture</label>
                <input name="picture" type="file" class="custom-file-input" placeholder="Picture" />
            </div>
        </div>

        @csrf


        <div class="form-group row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Update Room</button>
            </div>
            <div class="col-sm-9">
                <a href="{{ route('room_types.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection