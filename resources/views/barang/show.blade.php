@extends('admin.admin_master')
@section('title')
    View barang
@endsection

@section('admin.index')
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <a class="btn btn-app bg-info"href="{{ route('barang.index') }}">
                        <i class="fas fa-angle-double-left"></i> Back</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td>{{ $barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td>:</td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('uploads/' . $barang->gambar) }}" width="150px">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>@rupiah{{ $barang->harga }}</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>{{ $barang->stok }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        </div>
    @endsection
