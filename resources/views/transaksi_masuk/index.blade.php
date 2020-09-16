@extends('layouts.template')

@section('title')
    Data Transaksi
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="small-box">
                <div class="box-header">

                    {{-- @if (Request::get('keyword'))
                        <a href="{{route('transaksi_masuk.index')}}" class="btn btn-success">Back</a>
                    @else
                        <a href="{{route('transaksi_masuk.create')}}" class="btn btn-success"><i class="fas fa-user-plus"> Tambah</i></a>
                    @endif --}}

                    @if (Request::get('start_date') != "" && Request::get('end_date') != "")
                        <a href="{{route('transaksi_masuk.index')}}" class="btn btn-success">Back</a>
                    @else
                        <a href="{{route('transaksi_masuk.create')}}" class="btn btn-success"><i class="fas fa-user-plus"> Tambah</i></a>
                    @endif

                    <form action="{{route('transaksi_masuk.index')}}" method="get">
                        <div class="form-group">
                            <label for="nama_produk" class="col-sm-2">Search by Date</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="date" name="start_date" placeholder="Start Date">
                            </div>

                            <div class="col-sm-4 mt-1">
                                <input class="form-control" type="date" name="end_date" placeholder="Finish Date">
                            </div>

                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"> Search</i></button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="box-body">

                    @if (Request::get('start_date') != "" && Request::get('end_date') != "")
                        <div class="alert alert-success">
                            Hasil Pencarian Transaksi Masuk Dari Tanggal: <b> {{$start_date}} s/d {{$end_date}} </b>
                        </div>
                    @endif

                    @include('alert.success')

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Produk</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksiMasuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($transaksiMasuk->perPage() * ($transaksiMasuk->currentPage() - 1)) }}</td>
                                    <td>{{ $item->produk->nama_produk }}</td>
                                    <td>{{ $item->supplier->nama_supplier}}</td>
                                    <td>{{ $item->tanggal_transaksi }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    {{--  <td>{{ $item->harga }}</td>  --}}
                                    <td> @rupiah($item->harga)</td>
                                    <td>
                                        <form action="{{ route('transaksi_masuk.destroy', [$item->kd_transaksi]) }}" method="post" onsubmit="return confirm('Apakah yakin akan menghapus ?');">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$transaksiMasuk->appends(Request::all())->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
