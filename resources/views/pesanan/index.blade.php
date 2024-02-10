@extends('admin.admin_master')

@section('title')
    Data Pesanan
@endsection

@section('admin.index')
    <section class="content">
        <div class="col">
            <div class="col-md-12">
                {{--  fungsi add atau tambah --}}
                <div class="box-header with-border">
                    @if (Request::get('keyword'))
                        <a class="btn btn-app bg-info"href="{{ route('pesanan.index') }}">
                            <i class="fas fa-recycle"></i> Reset</a>
                    @else
                        <a class="btn btn-app bg-success"href="{{ route('pesanan.create') }}">
                            <i class="fas fa-plus"></i> Add</a>
                    @endif
                    <div class="row">
                        <div class="col-md-3 offset-md-9">
                            <form method="get" action="{{route('pesanan.index')}}">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" placeholder="Search by Produk" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if (Request::get('keyword'))
                    <div class="alert alert-info alert-block">
                        Hasil pencarian pesanan dengan keyword: <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Tanggal Pesan</th>
                            <th>Metode</th>
                            <th>Total Amount</th>
                            <th>Discount</th>
                            <th>Total To Pay</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $row)
                            <tr>
                                <td>{{ $loop->iteration + $pesanan->perPage() * ($pesanan->currentPage() - 1) }}</td>
                                <td>{{ $row->$pembeli->nama }}</td>
                                <td>{{ $row->$barang->nama_barang }}</td>
                                <td>{{ $row->$barang->harga }}</td>
                                <td>{{ $row->qty }}</td>
                                <td>{{ $row->tgl_pesan }}</td>
                                <td>{{ $row->metode }}</td>
                                <td>{{ $row->total_amount }}</td>
                                <td>{{ $row->discount }}</td>
                                <td>{{ $row->total_to_pay }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <form method="POST" action="{{ route('pesanan.destroy', [$row->id]) }}"
                                        onsubmit="return confirm('Apakah anda yakin akan menghapus pesanan, {{ $row->barang->nama_barang }}?')">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-info" href="{{ route('pesanan.edit', [$row->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a class="btn btn-warning" href="{{ route('pesanan.show', [$row->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pesanans->appends(Request::all())->links() }}
            </div>
        </div>
    </section>
@endsection
