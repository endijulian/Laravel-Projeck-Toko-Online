@extends('layouts.template')

@section('title')
    Tambah Produk
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">

                <div class="box-header">
                    @include('alert.error')
                </div>

                <div class="box-body">
                    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <label for="nama_produk" class="col-sm-2">Nama Produk</label>
                            <div class="col-sm-6">
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{old('nama_produk')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kd_kategori" class="col-sm-2">Nama Kategori</label>
                            <div class="col-sm-6">
                                <select name="kd_kategori" id="kd_kategori" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->kd_kategori }}">{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga" class="col-sm-2">Harga</label>
                            <div class="col-sm-6">
                                <input type="number" name="harga" id="harga" class="form-control" value="{{old('harga')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar_produk" class="col-sm-2">Harga</label>
                            <div class="col-sm-6">
                                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" value="{{old('gambar_produk')}}">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
