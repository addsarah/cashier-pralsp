@extends('admin.admin_master')
@section('title')
    Edit Data Barang
@endsection

@section('admin.index')
    <div class="row-container">
        <div class="col-md-12">
            <div class="box">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('barang.update', [$barang->id]) }}" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <!-- edit nama barang -->
                                <div class="form-group">
                                    <label for="exampleInputNamaBarang">Nama Barang</label>
                                    <input type="text" name="nama_barang"class="form-control" id="exampleInputNamaBarang"
                                        value="{{ $barang->nama_barang }}" placeholder="Masukan Nama Barang">
                                </div>

                                <!-- edit harga -->
                                <div class="form-group">
                                    <label for="exampleInputHarga">Harga</label>
                                    <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}"
                                        id="exampleInputHarga" placeholder="Masukan Harga">
                                </div>

                                <!-- edit stok -->
                                <div class="form-group">
                                    <label for="exampleInputStok">Stok</label>
                                    <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}"
                                        id="exampleInputStok" placeholder="Masukan Stok">
                                </div>

                                <!-- edit gambar -->
                                <div class="form-group" align="center">
                                    <label for="exampleInputFile"> <img class="img-thumbnail"
                                            src="{{ asset('uploads/' . $barang->gambar) }}" width="150px" /></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" value="{{ $barang->gambar }}"
                                                name="gambar"class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Edit Gambar</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="box-footer">
                                        <button type="submit" name="tombol" class="btn btn-info pull-right">Edit</button>
                                        <a href="{{ route('barang.index') }}" class="btn btn-danger float-right">Cancel</a>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endsection
