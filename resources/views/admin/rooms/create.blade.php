@extends('layouts.dashboard.app', ['title' => 'Ruangan'])

@section('content')
    <form action="/rooms/store" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                New Room
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="room">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('role') ?? '' }}" />
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
