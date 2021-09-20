@extends('layouts.dashboard.app', ['title' => 'Ruangan'])

@section('content')
    <form action="/rooms/{{ $room->id }}/edit" method="POST" autocomplete="off">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                Edit Room
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="room">Room</label>
                            <input type="text" class="form-control" id="name" name="name" value=" {{ old('name') ?? $room->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary px-5">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
