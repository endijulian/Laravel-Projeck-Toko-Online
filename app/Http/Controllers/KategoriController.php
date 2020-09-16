<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = Kategori::paginate(5);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $kategori = Kategori::where('kategori', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'kategori' => 'required|max:255',
            'gambar_kategori' => 'required|image|mimes:jpg,jpeg,png|max:2048s'
        ]);
        if ($validasi->fails()) {
            return redirect()->route('kategori.create')->withErrors($validasi)->withInput();
        }

        $gambar_kategori = $request->file('gambar_kategori');
        $extention = $gambar_kategori->getClientOriginalExtension();

        if ($request->file('gambar_kategori')->isValid()) {
            $namaFoto = "kategori/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/kategori';
            $request->file('gambar_kategori')->move($upload_path, $namaFoto);

            $data['gambar_kategori'] = $namaFoto;
        }

        Kategori::create($data);

        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Disimpan');
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
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);
        $input = $request->all();

        $validasi = Validator::make($input, [
            'kategori' => 'required|max:255',
            'gambar_kategori' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('kategori.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar_kategori')) {
            if ($request->file('gambar_kategori')->isValid()) {
                Storage::disk('upload')->delete($kategori->gambar_kategori);

                $gambar_kategori = $request->file('gambar_kategori');
                $extention = $gambar_kategori->getClientOriginalExtension();

                $namaFoto = "kategori/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/kategori';
                $request->file('gambar_kategori')->move($upload_path, $namaFoto);

                $input['gambar_kategori'] = $namaFoto;
            }
        }

        $kategori->update($input);

        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        Storage::disk('upload')->delete($kategori->gambar_kategori);

        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil di Hapus');
    }
}
