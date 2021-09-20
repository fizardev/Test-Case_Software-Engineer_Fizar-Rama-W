@extends('layouts.dashboard.app'['title' => 'Role'])

@section('content')
    <form action="/roles/{{ $role->role }}/edit" method="POST" autocomplete="off">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                Edit Role
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value=" {{ old('role') ?? $role->role }}" />
                            @error('role')
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
