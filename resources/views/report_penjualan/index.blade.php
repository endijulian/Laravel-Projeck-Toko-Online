@extends('layouts.template')

@section('title')
    Report Penjualan
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="small-box">

            <div class="box-header">
                <a target="_blank" href="{{route('cetak_pdf')}}" class="btn btn-success mb-2">Cetak PDF</a>
                <a target="_blank" href="{{route('cetak_excel')}}" class="btn btn-danger mb-2">Cetak EXCEL</a>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Agen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->produk->nama_produk }}</td>
                                <td>{{ $item->jumlah }}</td>
                                {{-- <td>{{ $item->harga }}</td> --}}
                                <td> @rupiah($item->harga)</td>
                                <td>{{ $item->transaksi->tanggal_penjualan }}</td>
                                <td>{{ $item->transaksi->agen->nama_toko }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$penjualan->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
