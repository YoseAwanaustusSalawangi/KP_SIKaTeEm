<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::paginate(10);
        return view('home', ['mhs'=> $mhs]);
    }

    public function search(Request $request) 
    {
        $cari = $request->m;
        $mhs = DB::table('mahasiswa')
        ->where('namaMhs','like',"%".$cari."%")
        ->paginate();
        return view('home', ['mhs'=> $mhs]);
    }

    public function verifikasi(Request $req){
        Mahasiswa::where('nim', $req->get('nim'))->update(['status' => $req->get('status')]);
        return redirect('/home');
    }
}
