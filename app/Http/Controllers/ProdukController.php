<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::paginate(5);
        $kategori = Kategori::all();
        $filterKeyword = $request->get('keyword');
        $nama_kategori = '';

        if ($filterKeyword) {
            $produk = Produk::where('nama_produk', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        
        $filter_byKategori = $request->get('kd_kategori');
        if ($filter_byKategori) {
            $produk = Produk::where('kd_kategori', $filter_byKategori)->paginate(4);

            $data_kategori = Kategori::find($filter_byKategori);
            $nama_kategori = $data_kategori->kategori;
        }

        return view('produk.index', compact('produk', 'kategori', 'nama_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_produk = $request->all();

        $validasi = Validator::make($input_produk, [
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar_produk' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('produk.create')->withErrors($validasi)->withInput();
        }

        if ($request->file('gambar_produk')->isValid()) {
            $gambar_produk = $request->file('gambar_produk');
            $extention = $gambar_produk->getClientOriginalExtension();

            $namaFoto = "produk/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/produk';
            $request->file('gambar_produk')->move($upload_path, $namaFoto);

            $input_produk['gambar_produk'] = $namaFoto;
        }

        $input_produk['stok'] = 0;

        Produk::create($input_produk);

        return redirect()->route('produk.index')->with('status', 'Data Produk Berhasil di Tambah ');
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
        $kategori = Kategori::all();
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('kategori', 'produk'));
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
        $produk = Produk::findOrFail($id);
        $input_produk = $request->all();

        $validasi = Validator::make($input_produk, [
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar_produk' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('produk.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar_produk')) {
            if ($request->file('gambar_produk')->isValid()) {
                Storage::disk('upload')->delete($produk->gambar_produk);

                $gambar_produk = $request->file('gambar_produk');
                $extention = $gambar_produk->getClientOriginalExtension();

                $namaFoto = "produk/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/produk';
                $request->file('gambar_produk')->move($upload_path, $namaFoto);

                $input_produk['gambar_produk'] = $namaFoto;
            }
        }

        $produk->update($input_produk);

        return redirect()->route('produk.index')->with('status', 'Produk Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        Storage::disk('upload')->delete($produk->gambar_produk);

        return redirect()->route('produk.index')->with('status', 'Produk Berhasil di Hapus');
    }
}
