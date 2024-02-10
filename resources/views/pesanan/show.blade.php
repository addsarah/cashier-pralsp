@extends('admin.admin_master')
@section('title')
Show Pesanan
@endsection

@section('admin.index')
<section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                <a class="btn btn-app bg-info"href="{{ route('pesanan.index')}}" >
                  <i class="fas fa-angle-double-left"></i> Back</a>    
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                    <td>Jumlah Unit</td>
                    <td>:</td>
                    <td>{{ $pesanan->qty }}</td>
                   </tr> 
                <tr>
                    <td>Tanggal Pesan</td>
                    <td>:</td>
                    <td>{{ $pesanan->tgl_pesan }}</td>
                   </tr> 
                   <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td>{{ $pesanan->barang->nama_barang}}</td>
                   </tr>
                   <tr>
                    <td>Nama Pembeli</td>
                    <td>:</td>
                    <td>{{ $pesanan->pembeli->nama}}</td>
                   </tr>
            </table>
            </div>
        </div>
    </div>
</div>


@endsection