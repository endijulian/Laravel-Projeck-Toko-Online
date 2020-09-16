<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h3>Report Penjualan</h3>
    <hr>

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
            @foreach ($penjualan as $item)
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
</body>
</html>
