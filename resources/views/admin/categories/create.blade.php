@extends('layouts.dashboard.app', ['title' => 'Kategori'])

@section('content')
    <form action="/categories/store" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                New Category
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? '' }}" />
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
