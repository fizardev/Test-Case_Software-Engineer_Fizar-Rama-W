@extends('layouts.dashboard.app', ['title' => 'Barang'])

@section('content')
    <form action="/items/{{ $item->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $item->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pj">Penanggung Jawab</label>
                            <select name="user_id" id="role" class="form-control">
                                @foreach ($users as $user)
                                    
                                    <option value="{{ $user->id }}" {{ $user->id === $item->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Ruangan">Ruangan</label>
                            <select name="room_id" id="room_id" class="form-control">
                                @foreach ($rooms as $room)
                                    
                                    <option value="{{ $room->id }}" {{ $room->id === $item->room_id ? 'selected' : '' }}>{{ $room->name }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">

                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control select2" id="category" name="category[]" multiple>
                                @foreach ($item->categories as $category)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @endforeach
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
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
