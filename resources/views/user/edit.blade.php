@extends('layouts.template')

@section('title')
    Edit Data User
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('user.update', [$user->id])}}" method="post" class="form-horizontal">
                        @csrf

                        {{ method_field('PUT') }}
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" class="form-control" type="text" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-6">
                                <input id="username" name="username" class="form-control" type="text" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input id="email" name="email" class="form-control" type="email" value="{{ $user->email }}">
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
                                    <option value="admin" @if($user->level == "admin") selected @endif>Administrator</option>
                                    <option value="staff" @if($user->level == "staff") selected @endif>Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" name="tombol" class="btn btn-info pull-right">Ubah</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
