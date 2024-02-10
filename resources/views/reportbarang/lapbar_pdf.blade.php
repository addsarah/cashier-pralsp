<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Report Barang</title>
</head>

<body>
    <h3>Report Data Barang</h3>
    </hr>
    <table style="width:100%">
        <thead>
            <tr>
                <td bgcolor="cyan" width="5%">No</td>
                <td bgcolor="cyan">Nama Barang</td>
                <td bgcolor="cyan">Gambar</td>
                <td bgcolor="cyan">Harga</td>
                <td bgcolor="cyan">Stok</td>
                <td bgcolor="cyan">Tanggal</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($R_barang as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_barang }}</td>
                    <td>{{ $row->gambar }}</td>
                    <td>{{ $row->harga }}</td>
                    <td>{{ $row->stok }}</td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p align="right">
        Date : {{ $row->created_at }} </br>
        Personal In Charge</br>

        @if (Auth::check())
            <span class="hidden-xs" fontsize=15>{{ Auth::user()->level }}</span>
        @endif
        </br>
        </br>

        </br>
        </br>
        @if (Auth::check())
            <span class="hidden-xs">({{ Auth::user()->name }})</span>
        @endif
</body>

</html>
