<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PegawaiResource;

class PegawaiController extends Controller
{
    public function loginPegawai(Request $request)
    {
        $input = $request->all();

        $validasi = Validator::make($input, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => FALSE,
                'msg' => $validasi->errors()
            ], 400);
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $pegawai = Pegawai::where([
            ['username', $username],
            ['is_aktif', 1]
        ])->first();

        if (is_null($pegawai)) {
            //jika pegawai tidak ditemukan
            return response()->json([
                'status' => FALSE,
                'msg' => 'Username tidak ditemukan'
            ], 200);
        } else {
            //jika pegawai ditemukan
            if (password_verify($password, $pegawai->password)) {

                //jika password sesuai
                return response()->json([
                    'status' => TRUE,
                    'msg' => 'Username ditemukan',
                    'pegawai' => new PegawaiResource($pegawai)
                ], 200);
            } else {
                //jika password tidak sesuai
                return response()->json([
                    'status' => FALSE,
                    'msg' => 'Username tidak sesuai',
                ], 200);
            }
        }
    }
}
