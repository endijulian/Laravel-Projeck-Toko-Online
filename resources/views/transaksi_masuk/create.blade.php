@extends('layouts.template')

@section('title')
    Tambah Data Transaksi Masuk
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="small-box">
                <div class="box-header">
                    @include('alert.error')
                </div>

                <div class="box-body">
                    <form action="{{ route('transaksi_masuk.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="kd_produk" class="col-sm-2 control-label">Nama Produk</label>
                            <div class="col-md-6">
                                <select name="kd_produk" id="kd_produk" class="form-control">
                                    @foreach($produk as $item)
                                        <option value="{{$item->kd_produk}}">{{ $item->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kd_supplier" class="col-sm-2 control-label">Nama Supplier</label>
                            <div class="col-md-6">
                                <select name="kd_supplier" id="kd_supplier" class="form-control">
                                    @foreach($supplier as $item)
                                        <option value="{{$item->kd_supplier}}">{{ $item->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_transaksi" class="col-sm-2 control-label">Tanggal Transaksi</label>
                            <div class="col-md-6" class="form-group">
                                <input class="form-control" type="date" id="tanggal_transaksi" name="tanggal_transaksi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-md-6" class="form-group">
                                <input class="form-control" type="number" id="jumlah" name="jumlah" value="{{old('jumlah')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga" class="col-sm-2 control-label">Harga</label>
                            <div class="col-md-6" class="form-group">
                                <input class="form-control" type="number" id="harga" name="harga" value="{{ old('harga') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
