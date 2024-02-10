@extends('admin.admin_master')

@section('title')
    Data User
@endsection

@section('admin.index')
    <section class="content">
        <div class="col">
            <div class="col-md-12">
                {{--  fungsi add atau tambah --}}
                <div class="box-header with-border">
                    @if (Request::get('keyword'))
                        <a class="btn btn-app bg-info"href="{{ route('user.index') }}">
                            <i class="fas fa-recycle"></i> Reset</a>
                    @else
                        <a class="btn btn-app bg-success"href="{{ route('user.create') }}">
                            <i class="fas fa-plus"></i> Add</a>
                    @endif
                    <a target="_blank" href="{{ route('cetak_user') }}" class="btn btn-danger float-left"><i class="fas fa-print"></i> Print PDF</a>
                    <form method="get" action="{{ route('user.index') }}">
                        <label for="keyword" class="col-sm-2 control-label">Search By Name</label>
                        <div class="col-md-4">
                            <input type="search" class="form-control form-control-lg" id="keyword" name="keyword" value="{{ Request::get('name') }}">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                @if (Request::get('keyword'))
                    <div class="alert alert-info alert-block">
                        Hasil pencarian user dengan keyword: <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $loop->iteration + $user->perpage() * ($user->currentPage() - 1) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <form method="POST" action="{{ route('user.destroy', [$row->id]) }}"
                                        onsubmit="return confirm('Apakah anda yakin akan menghapus,{{ $row->name }}?..')">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-info" href="{{ route('user.edit', [$row->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="btn bt-info" href="{{ route('user.edit', [$row->id]) }}"></a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a class="btn btn-warning" href="{{ route('user.show', [$row->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $user->appends(Request::all())->links() }}
            </div>
        </div>
    </section>
@endsection
