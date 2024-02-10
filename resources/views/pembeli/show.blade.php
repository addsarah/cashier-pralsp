@extends('admin.admin_master')
@section('title')
View Pembeli
@endsection

@section('admin.index')
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                <a class="btn btn-app bg-info"href="{{ route('pembeli.index')}}" >
                  <i class="fas fa-angle-double-left"></i> Back</a>    
            </div>
            <div class="box-body">
              <table class="table table-bordered"> 
                   <tr>
                       <td>Nama</td>
                       <td>:</td>
                       <td>{{ $pembeli->nama }}</td>
                   </tr>
                   <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $pembeli->email }}</td>
                </tr>
                   <tr>
                       <td>Jenis Kelamin</td>
                       <td>:</td>
                       <td>{{ $pembeli->jenis_kelamin }}</td>
                   </tr>
                   <tr>
                       <td>Alamat</td>
                       <td>:</td>
                       <td>{{ $pembeli->alamat }}</td>
                   </tr>
            </table>
            </div>
        </div>
    </div>
</div>


@endsection