<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $pegawai = Pegawai::where('username', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
            'username' => 'required|max:100|unique:pegawai',
            'password' => 'required|min:6|max:50',
            'nama_pegawai' => 'required|max:255',
            'jk' => 'required|max:255',
            'alamat' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('pegawai.create')->withInput()->withErrors($validasi);
        }

        $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);

        Pegawai::create($data);
        return redirect()->route('pegawai.index')->with('status', 'Data Pegawai Berhasil di Tambah');
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
    public function edit($pegawai)
    {
        $pegawai = Pegawai::findOrFail($pegawai);

        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $pegawai = Pegawai::findOrFail($username);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'password' => 'sometimes|nullable|min:6',
            'nama_pegawai' => 'required|max:255',
            'jk' => 'required|max:255',
            'alamat' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('pegawai.edit', [$username])->withErrors($validasi);
        }

        if ($request->input('password')) {
            $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        } else {
            $data = Arr::except($data, ['password']);
        }

        $pegawai->update($data);
        return redirect()->route('pegawai.index')->with('status', 'Data Pegawai Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $pegawai = Pegawai::findOrFail($username);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('status', 'Data Pegawai Berhasil di Hapus');
    }
}
