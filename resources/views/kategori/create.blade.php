@extends('layouts.template')

@section('title')
    Tambah Data Kategori
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('kategori.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-6">
                                <input type="text" id="kategori" name="kategori" class="form-control" value="{{ old('kategori') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar_kategori" class="col-sm-2 control-label">Gambar Kategori</label>
                            <div class="col-sm-6">
                                <input type="file" id="gambar_kategori" name="gambar_kategori" class="form-control" value="{{ old('gambar_kategori') }}">
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
