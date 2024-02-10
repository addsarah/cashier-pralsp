@extends('admin.admin_master')

@section('title')
    Edit Pembeli
@endsection

@section('admin.index')
    <section class="content">
        <div class="col">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form edit data pembeli</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('pembeli.update',[$pembeli->id]) }}" method="POST" class="form-horizontal">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required="true" placeholder="Enter Name"
                                        name="nama" value="{{ $pembeli->nama }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required="true" placeholder="Enter Email"
                                        name="email" value="{{ $pembeli->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Jenis Kelamin</label>
                                <div class="col-sm-12" required="true">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="laki-laki" @if($pembeli->jenis_kelamin == "laki-laki")
                                        @endif >laki-laki</option>
                                        <option value="perempuan" @if($pembeli->jenis_kelamin == "perempuan")@endif >perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Alamat</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required="true" placeholder="Enter Alamat"
                                        name="alamat" value="{{ $pembeli->alamat }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
