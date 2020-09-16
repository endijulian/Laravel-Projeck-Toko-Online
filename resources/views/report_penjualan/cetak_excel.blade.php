<table style="width: 100%" border="1">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Nama Agen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->produk->nama_produk}}</td>
                <td>{{$item->jumlah}}</td>
                <td>@rupiah($item->harga)</td>
                <td>{{$item->transaksi->tanggal_penjualan}}</td>
                <td>{{$item->transaksi->agen->nama_toko}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
