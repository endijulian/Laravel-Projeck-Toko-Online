@extends('layouts.template')

@section('title')
    Edit Data Kategori
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">

                <div class="box-header">
                    @include('alert.error')
                </div>

                <div class="box-body">
                    <form action="{{route('kategori.update', [$kategori->kd_kategori])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <div class="col-sm-6">
                                <input id="kategori" class="form-control" type="text" name="kategori" value="{{$kategori->kategori}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar_kategori" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <img src="{{asset('public/uploads/'. $kategori->gambar_kategori)}}" alt="" class="img-thumbnail" width="100px">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar_kategori">Gambar Kategori</label>
                            <div class="col-sm-6">
                                <input id="gambar_kategori" class="form-control" type="file" name="gambar_kategori" value="{{$kategori->gambar_kategori}}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Ubah</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
