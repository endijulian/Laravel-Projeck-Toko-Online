@extends('layouts.template')

@section('title')
    Tambah Data User
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('user.store')}}" method="post" class="form-horizontal">
                        @csrf
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" class="form-control" type="text" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-6">
                                <input id="username" name="username" class="form-control" type="text" value="{{old('username')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input id="email" name="email" class="form-control" type="email" value="{{old('email')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-6">
                                <input id="password" name="password" class="form-control" type="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="level" class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-6">
                                <select name="level" id="level" class="form-control">
                                    <option value="admin">Administrator</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" name="tombol" class="btn btn-info pull-right">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
