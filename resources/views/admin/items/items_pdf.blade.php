<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Data Barang</h5>

    </center>

    <table class='table table-bordered' width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $i => $item)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
