@extends('layouts.dashboard.app', ['title' => 'Role'])

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card table">
        <div class="card-body">
            <a href="{{ route('role.create') }}">
                <button class="btn btn-primary mb-4">
                    [+] Tambah Data
                </button>
            </a>
            @if ($roles->count() < 1)
                <div class="alert alert-info">
                    There's no items.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="60%">Nama</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $i => $role)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $role->role }}</td>
                                    <td class="text-center">
                                        <a href="/roles/{{ $role->id }}/edit" class="btn btn-success">Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">Delete</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah yakin ingin menghapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="/roles/{{ $role->id }}/delete" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-table mt-3">
                    <center>
                        {{ $roles->links() }}
                    </center>
                </div>

            @endif




            {{-- <nav aria-label="Page navigation example" class="pagination-table mt-3">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> --}}
        </div>
    </div>
@endsection
