<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $pegawai = DB::table('tbpegawai')->get();
        return view('pegawi',['pegawai'=>$pegawai]);
    }
}
