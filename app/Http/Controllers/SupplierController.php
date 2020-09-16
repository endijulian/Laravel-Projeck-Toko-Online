<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supplier = Supplier::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            //dijalankan jika ada pencarian
            $supplier = Supplier::where('nama_supplier', 'LIKE', "%$filterKeyword%")->paginate(5);
        }
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'nama_supplier' => 'required|min:3|max:50',
            'alamat_supplier' => 'required|max:255'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('supplier.create')->withInput()->withErrors($validasi);
        }

        Supplier::create($data);

        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil di Tambah');
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
    public function edit($kd_supplier)
    {
        $supplier = Supplier::findOrfail($kd_supplier);

        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_supplier)
    {
        $supplier = Supplier::findOrFail($kd_supplier);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama_supplier' => 'required|max:255',
            'alamat_supplier' => 'required|max:255'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('supplier.edit', [$kd_supplier])->withErrors($validasi);
        }

        $supplier->update($data);

        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_supplier)
    {
        $supplier = Supplier::findOrFail($kd_supplier);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil di Hapus');
    }
}
