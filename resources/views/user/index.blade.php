@extends('layouts.template')

@section('title')
    Data User
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">

                <div class="box-header with-border">

                    @if (Request::get('keyword'))
                        <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                    @else
                        <a href="{{route('user.create')}}" class="btn btn-success"><i class="fas fa-user-plus"> Tambah</i></a>
                    @endif

                    <form action="{{route('user.index')}}" method="get">
                        <div class="form-group">
                            <label for="keyword" class="col-sm-2">Search name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                            </div>
                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"> Search</i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">

                    @if(Request::get('keyword'))
                        <div class="alert alert-success">
                            Hasil Pencarian Keyword : <b>{{Request::get('keyword')}}</b>
                        </div>
                    @endif

                    @include('alert.success')

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{$loop->iteration + ($user->perpage()) * ($user->currentPage() - 1)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <form action="{{route('user.destroy', [$item->id])}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                            @csrf
                                            {{ method_field('DELETE') }}


                                            <a href="{{ route('user.edit', [$item->id]) }}" class="btn btn-warning">Edit</a>

                                            <a href="{{ route('user.show', [$item->id]) }}" class="btn btn-info">Detail</a>

                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{--  {{$user->links()}}  --}}
                    {{$user->appends(Request::all())->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
