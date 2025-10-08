<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;

class KaryawanController extends Controller
{
    public function index()
    {
        $pg = DB::table('karyawan')->get();
        return view('karyawan.karyawan',['pg'=>$pg]);
    }

    public function ViewTambah()
    {
        return view('karyawan.tambahpegawai');
    }

    public function storePegawai(Request $request)
    {
        DB::table('karyawan')->insert([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->almt,
            'gaji' => $request->gaji,
        ]);
        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $pg = DB::table('karyawan')->where('id_karyawan',$id)->get();
        return view('karyawan.edit',['pg'=>$pg]);
    }

    public function ProsesEdit(Request $request)
    {
        DB::table('karyawan')->where('id_karyawan',$request->id)->update([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
        ]);
        return redirect('/karyawan');
    }

    public function delete($id)
    {
        $dl = DB::table('karyawan')->where('id_karyawan',$id)->delete();

        return redirect('/karyawan');
    }
}
