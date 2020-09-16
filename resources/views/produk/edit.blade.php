@extends('layouts.template')

@section('title')
    Edit Produk
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">

                <div class="box-header">
                    @include('alert.error')
                </div>

                <div class="box-body">
                    <form action="{{ route('produk.update', [$produk->kd_produk]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <div class="col-sm-6">
                            <input id="nama_produk" class="form-control" type="text" name="nama_produk" value="{{$produk->nama_produk}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kd_kategori" class="col-sm-2">Nama Kategori</label>
                        <div class="col-sm-6">
                            <select name="kd_kategori" id="kd_kategori" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kd_kategori }}" @if($produk->kd_kategori == $item->kd_kategori) selected @endif>{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga" class="col-sm-2">Harga</label>
                        <div class="col-sm-6">
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar_produk" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <img src="{{asset('public/uploads/'. $produk->gambar_produk)}}" alt="" class="img-thumbnail" width="100px">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar_produk">Gambar Kategori</label>
                        <div class="col-sm-6">
                            <input id="gambar_produk" class="form-control" type="file" name="gambar_produk" value="{{$produk->gambar_produk}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info">Ubah</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
