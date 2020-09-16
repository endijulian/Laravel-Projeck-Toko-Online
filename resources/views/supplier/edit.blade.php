@extends('layouts.template')

@section('title')
    Edit Data Supplier
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="small-box">
                <div class="box-header with-border">

                    @include('alert.error')

                </div>
                <div class="box-body">

                    <form action="{{route('supplier.update', [$supplier->kd_supplier])}}" method="post" class="form-horizontal">
                        @csrf

                        {{ method_field('PUT') }}
                        {{-- {{csrf-field()}} --}}
                        <div class="form-group">
                            <label for="nama_supplier" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-6">
                                <input id="nama_supplier" name="nama_supplier" class="form-control" type="text" value="{{ $supplier->nama_supplier }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat_supplier" class="col-sm-2 control-label">Alamat Supplier</label>
                            <div class="col-sm-6">
                                <textarea name="alamat_supplier" id="alamat_supplier">{{ $supplier->alamat_supplier }}</textarea>
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
