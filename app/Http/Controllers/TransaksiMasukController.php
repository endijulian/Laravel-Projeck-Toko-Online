<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Supplier;
use App\TransaksiMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksiMasuk = TransaksiMasuk::orderBy('tanggal_transaksi', 'DESC')->paginate(5);

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        if ($start_date != "" && $end_date != "") {
            $transaksiMasuk = TransaksiMasuk::whereBetWeen('tanggal_transaksi', [$start_date, $end_date])->orderBy('tanggal_transaksi', 'DESC')->paginate(10);

            $start_date = \Carbon\Carbon::parse($start_date)->format('d F Y');
            $end_date = \Carbon\Carbon::parse($end_date)->format('d F Y');
        }

        return view('transaksi_masuk.index', compact('transaksiMasuk', 'start_date', 'end_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $supplier = Supplier::all();

        return view('transaksi_masuk.create', compact('produk', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_transaksi = $request->all();

        $validasi = Validator::make($data_transaksi, [
            'tanggal_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('transaksi_masuk.create')->withErrors($data_transaksi)->withInput();
        }

        TransaksiMasuk::create($data_transaksi);

        $produk = Produk::find($data_transaksi['kd_produk']);
        $data['stok'] = $produk->stok + $data_transaksi['jumlah'];
        $produk->update($data);

        return redirect()->route('transaksi_masuk.index')->with('status', 'Data Transaksi Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_transaksi = TransaksiMasuk::findOrFail($id);
        $jumlah = $data_transaksi->jumlah;

        $produk = Produk::find($data_transaksi->kd_produk);
        $data['stok'] = $produk->stok - $jumlah;
        $produk->update($data);

        $data_transaksi->delete();
        return redirect()->route('transaksi_masuk.index')->with('status', 'Data Berhasil di Hapus');
    }
}
