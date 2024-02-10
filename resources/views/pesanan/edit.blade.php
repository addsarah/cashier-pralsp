@extends('admin.admin_master')
@section('title')
    Edit Data Pesanan
@endsection

@section('admin.index')
    <div class="row-container">
        <div class="col-md-12">
            <div class="box">

                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Data Pesanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pesanan.update', [$pesanan->id]) }}" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">

                                <!-- edit Jumlah Unit -->
                                <div class="form-group">
                                    <label for="exampleInputQty1">Jumlah Unit</label>
                                    <input type="number" name="qty" class="form-control" value="{{ $pesanan->qty }}"
                                        id="exampleInputQty1" placeholder="Masukan Jumlah Unit">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 label-control">Tanggal Pesan</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" required="true"
                                            placeholder="Enter Tanggal Pesan" name="tgl_pesan"
                                            value="{{ $pembeli->tgl_pesan }}">
                                    </div>
                                </div>

                                <!-- edit nama Barang -->
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select class="form-control" name="id_barang">
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- edit nama pembelis -->
                                <div class="form-group">
                                    <label>Nama pembeli</label>
                                    <select class="form-control" name="id_pembelis">
                                        @foreach ($pembelis as $pembeli)
                                            <option value="{{ $pembelis->id }}">{{ $pembelis->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <div class="box-footer">
                                        <button type="submit" name="tombol" class="btn btn-info pull-right">Edit</button>
                                        <a href="{{ route('pesanan.index') }}" class="btn btn-danger float-right">Cancel</a>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endsection
