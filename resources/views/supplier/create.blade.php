@extends('layouts.template')

@section('title')
    Tambah Data Supplier
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('supplier.store')}}" method="post" class="form-horizontal">
                        @csrf
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="nama_supplier" class="col-sm-2 control-label">Nama Supplier</label>
                            <div class="col-sm-6">
                                <input id="nama_supplier" name="nama_supplier" class="form-control" type="text" value="{{old('nama_supplier')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat_supplier" class="col-sm-2 control-label">Alamat Supplier</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="alamat_supplier" id="alamat_supplier" >{{ old('alamat_supplier') }}</textarea>
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
