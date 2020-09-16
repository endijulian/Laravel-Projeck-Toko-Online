@extends('layouts.template')

@section('title')
    Edit Data Pegawai
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('pegawai.update', [$pegawai->username])}}" method="post" class="form-horizontal">
                        @csrf

                        {{ method_field('PUT') }}
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-6">
                                <input disabled id="username" name="username" class="form-control" type="text" value="{{ $pegawai->username }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-6">
                                <input id="password" name="password" class="form-control" type="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_pegawai" class="col-sm-2 control-label">Nama Pegawai</label>
                            <div class="col-sm-6">
                                <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select name="jk" id="jk" class="form-control">
                                    <option value="PRIA" @if($pegawai->jk == "PRIA") selected @endif>Pria</option>
                                    <option value="WANITA" @if($pegawai->jk == "WANITA") selected @endif>Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea name="alamat" id="alamat" class="form-control">{{ $pegawai->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_aktif" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-6">
                                <select name="is_aktif" id="is_aktif" class="form-control">
                                    <option value="1" @if($pegawai->is_aktif == "1") selected @endif>Aktif</option>
                                    <option value="0" @if($pegawai->is_aktif == "0") selected @endif>Tidak Aktif</option>
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
