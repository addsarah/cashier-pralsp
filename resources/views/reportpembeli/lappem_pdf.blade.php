<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Report pembeli</title>
</head>

<body>
    <h3>Report Data pembeli</h3>
    <table style="width:100%; border-collapse: collapse; border: 1px solid black;">
        <thead>
            <tr>
                <th bgcolor="cyan" width="5%" style="border: 1px solid black;">No</th>
                <th bgcolor="cyan" style="border: 1px solid black;">Nama Pembeli</th>
                <th bgcolor="cyan" style="border: 1px solid black;">Email</th>
                <th bgcolor="cyan" style="border: 1px solid black;">Jenis Kelamin</th>
                <th bgcolor="cyan" style="border: 1px solid black;">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($R_pembeli as $row)
                <tr>
                    <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black;">{{ $row->nama }}</td>
                    <td style="border: 1px solid black;">{{ $row->email }}</td>
                    <td style="border: 1px solid black;">{{ $row->jenis_kelamin }}</td>
                    <td style="border: 1px solid black;">{{ $row->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p align="right">
        Date : {{ $row->created_at }} </br>
        Personal In Charge</br>

        @if (Auth::check())
            <span class="hidden-xs" style="font-size: 15px;">{{ Auth::user()->level }}</span>
        @endif
        </br>
        </br>

        </br>
        </br>
        @if (Auth::check())
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
        @endif
    </p>
</body>

</html>
