<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Report pesanan</title>
    <style>
        /* Styles for your PDF view */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }

        .payment-method {
            margin-top: 20px;
        }

        p {
            font-size: 15px;
        }
    </style>
</head>

<body>
    <h3>Report Data pesanan</h3>
    <hr>

    <table>
        <!-- Table headers -->
        <thead>
            <tr>
                <td bgcolor="cyan" width="5%">No</td>
                <td bgcolor="cyan">Nama Pelanggan</td>
                <td bgcolor="cyan">Nama Barang</td>
                <td bgcolor="cyan">Harga</td>
                <td bgcolor="cyan">Qty</td>
                <td bgcolor="cyan">Tanggal Pesanan</td>
                <td bgcolor="cyan">Metode</td>
                <td bgcolor="cyan">Total-amount</td>
                <td bgcolor="cyan">Discount</td>
                <td bgcolor="cyan">Total-to-pay</td>
                <td bgcolor="cyan">Waktu Pesan</td>
            </tr>
        </thead>
        <tbody>
            <!-- Table data -->
            @foreach ($R_pesanan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->pembeli->nama }}</td>
                    <td>{{ $row->barang->nama_barang }}</td>
                    <td>{{ $row->barang->harga }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>{{ $row->tgl_pesan }}</td>
                    <td>{{ $row->metode }}</td>
                    <td>{{ $row->total_amount }}</td>
                    <td>{{ $row->discount }}</td>
                    <td>{{ $row->total_to_pay }}</td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total row and payment method information -->
    <div class="total-row">
        <p>Total Harga: Rp. {{ $totalAmount ?? 0 }}</p>
        <p>Diskon: Rp. {{ $discount ?? 0 }}</p>
        <p>Total yang Harus Dibayar: Rp. {{ $totalToPay ?? 0 }}</p>
    </div>

    <div class="payment-method">
        <p>Metode Pembayaran: {{ $paymentMethod ?? 'Belum dipilih' }}</p>
    </div>

    <!-- Signature and additional information -->
    <p align="right">
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
