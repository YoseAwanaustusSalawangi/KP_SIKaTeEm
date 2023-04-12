<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

}
