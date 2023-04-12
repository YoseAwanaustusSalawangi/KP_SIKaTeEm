<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mahasiswa;
Use PDF;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::paginate(10);
        return view('home', ['mhs'=> $mhs]);
    }

    public function cetak_pdf()
    {
        $dtCetakmhs = Mahasiswa::get();
        $pdf = PDF::loadview('cetak-data-ktm',['dtCetakmhs'=>$dtCetakmhs]);
        return $pdf->stream('Data_KTM_Mahasiswa_UKDW'.'.pdf');
    }
    
    public function tambah()
    {
        return view('tambahMhs');
    }

    public function simpan(Request $request) 
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'namaMhs' => $request->namaMhs,
            'prodi' => $request->prodi
        ]);
        return redirect("/home")->with('sukses', 'Data Berhasil Ditambhakan');
    }

    public function edit($id) 
    {
        $mhs = Mahasiswa::find($id);
        return view('ubahMhs', ['mhs' => $mhs]);
    }

    public function updated($id, Request $request) 
    {
        $mhs = Mahasiswa::find($id);
        $mhs->nim = $request->nim;
        $mhs->namaMhs = $request->namaMhs;
        $mhs->prodi = $request->prodi;
        $mhs->save();
        return redirect("/home");
    }

    public function delete($id) 
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return redirect('/home');
    }

    public function search(Request $request) 
    {
        $cari = $request->m;
        $mhs = DB::table('mahasiswa')
        ->where('namaMhs','like',"%".$cari."%")
        ->paginate();
        return view('home', ['mhs'=> $mhs]);
    }

    public function upload($nim){
        $mhs = Mahasiswa::where([
            ['nim'],
            ])->value('nim');
        return view('upload',compact('mhs','nim'));
	}

    public function proses_upload(Request $request){

        // if($request->file('dokumen')) {
        //     Storage::delete($request->file('dokumen'));
        // }

        $mhs = Mahasiswa::get();

        $request->validate([
            'dokumen' => 'required',
            'dokumen.*' => 'mimes:doc,docx,PDF,pdf|max:2000',
            'foto' => 'required',
            'foto.*' => 'mimes:jpg,jpeg,png|max:2000'
            
        ]);
        if ($request->hasfile('dokumen')) {           
            $filename = $request->file('dokumen')->getClientOriginalName();
            $request->file('dokumen')->storeAs('public/ktm_files',$filename);
            Mahasiswa::where('nim',$request->get('nim'))->update([
                'dokumen' => $filename
            ]);
            
        }
        if ($request->hasfile('foto')) {           
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/foto_files',$filename);
            Mahasiswa::where('nim',$request->get('nim'))->update([
                'foto' => $filename
            ]);
            return redirect('/home')->with('sukses','Upload Berhasil!');
        }
	}
}
