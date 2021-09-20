@extends('layouts.dashboard.app', ['title' => 'Barang'])

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card table">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <a href="{{ route('item.create') }}">
                    <button class="btn btn-primary mb-4">
                        [+] Tambah Data
                    </button>
                </a>
                @if (auth()->user()->role_id == 2)

                    <a href="/items/cetak_items">
                        <button class="btn btn-danger mb-4">
                            Cetak PDF
                        </button>
                    </a>
                    <a href="/items/cetak_excel">
                        <button class="btn btn-success mb-4">
                            Cetak Excel
                        </button>
                    </a>
                @endif
            </div>
            @if ($items->count() < 1)
                <div class="alert alert-info">
                    There's no items.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($items as $i => $item)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" alt=""
                                            style="width: 90px; height: 90px; object-fit: cover; object-position: center;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->room->name }}</td>
                                    <td>
                                        @foreach ($item->categories as $i => $category)
                                            @if ($item->categories->count() - $i == 1)
                                                {{ $category->name }}
                                            @else
                                                {{ $category->name }},
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if ($items)

                                            <a href="/items/{{ $item->id }}/edit" class="btn btn-success">Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal">Delete</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah yakin ingin menghapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="/items/{{ $item->id }}/delete" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-table mt-3">
                    <center>
                        {{ $items->links() }}
                    </center>
                </div>
            @endif



        </div>
    </div>
@endsection
