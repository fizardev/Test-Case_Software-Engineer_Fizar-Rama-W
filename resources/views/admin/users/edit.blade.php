@extends('layouts.dashboard.app', ['title' => 'User'])

@section('content')
    <form action="/users/{{ $user->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $user->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                                name="email" value="{{ old('email') ?? $user->email }}" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="role_id" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    @if ($role->id === $user->role_id)
                                    <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                                    @elseif(auth()->user()->role_id == 2 && $role->role != "owner")
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @elseif (auth()->user()->role_id !== 2) 
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama">Image</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">

                            @error('avatar')
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
