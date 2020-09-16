@extends('layouts.template')

@section('title')
    Data Produk
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="small-box">

                <div class="box-header">

                    @if (Request::get('keyword'))
                        <a href="{{route('produk.index')}}" class="btn btn-success">Back</a>
                    @else
                        <a href="{{route('produk.create')}}" class="btn btn-success"><i class="fas fa-user-plus"> Tambah</i></a>
                    @endif

                    <form action="{{route('produk.index')}}" method="get">
                        <div class="form-group">
                            <label for="keyword" class="col-sm-2">Search by Name</label>
                            <div class="col-sm-4">
                                <input id="keyword" class="form-control" type="text" name="keyword" value="{{Request::get('keyword')}}">
                            </div>

                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"> Search</i></button>
                            </div>
                        </div>
                    </form>

                    <form action="{{route('produk.index')}}" method="get">
                        <div class="form-group">
                            <label for="kd_kategori" class="col-sm-2">Search by Kategori</label>
                            <div class="col-sm-4">
                                <select name="kd_kategori" id="kd_kategori" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{$item->kd_kategori}}">{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"> Search</i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="box-body">

                    @if (Request::get('keyword'))
                        <div class="alert alert-success">
                            Hasil Pencarian : <b>{{Request::get('keyword')}}</b>
                        </div>
                    @endif

                    @if (Request::get('kd_kategori'))
                        <div class="alert alert-success">
                            Hasil Pencarian Kategori: <b>{{ $nama_kategori }}</b>
                        </div>
                    @endif

                    @include('alert.success')

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Produk</th>
                                <th>Nama Kategori</th>
                                <th>Harga</th>
                                <th>Gambar Produk</th>
                                <th>Stok</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $item)
                            <tr>
                                <td>{{$loop->iteration + ($produk->perPage()) * ($produk->currentPage() - 1)}}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->kategori->kategori }}</td>
                                {{--  <td>{{ $item->harga }}</td>  --}}
                                <td>@rupiah($item->harga)</td>
                                {{--  <td>{{ $item->gambar_produk }}</td>  --}}
                                <td><img src="{{asset('public/uploads/'.$item->gambar_produk)}}" class="img-thumbnail" width="100ox;"></td>
                                <td>{{ $item->stok }}</td>
                                <td>
                                    <form action="{{route('produk.destroy',[$item->kd_produk])}}" method="post" onsubmit="return confirm('Yakin ingin menghapus ?')">
                                        @csrf
                                        {{method_field('DELETE')}}

                                        <a href="{{ route('produk.edit', [$item->kd_produk]) }}" class="btn btn-warning">Edit</a>

                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$produk->appends(Request::all())->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
