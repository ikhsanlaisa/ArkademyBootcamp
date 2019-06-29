<?php

namespace App\Http\Controllers;

use App\hobi;
use App\kategori;
use App\nama;
use Alert;
use Illuminate\Http\Request;

class NamaController extends Controller
{
    public function index(){
        $hobi = hobi::all();
        $kategori = kategori::all();
        $nama = nama::all();
//        dd($nama);
        return view('homepage', ['hobi'=>$hobi, 'kategori'=>$kategori, 'nama'=>$nama]);
    }

    public function store(Request $request)
    {
        $nama = new nama();
        $nama->name = $request->input('nama');
        $nama->id_hobi = $request->input('id_hobi');
        $nama->id_kategori = $request->input('id_kategori');
        $nama->save();
        Alert::success('Data layanan berhasil dibuat', 'Selamat')->autoclose(3000);
        return redirect('/');
    }

    public function show($id)
    {
        $nama = nama::find($id);
        return response()->json($nama);
    }

    public function update(Request $request, $id)
    {
        $nama = nama::find($id);
        $nama->name = $request->input('namas');
        $nama->id_hobi = $request->input('id_hobis');
        $nama->id_kategori = $request->input('id_kategoris');
        $nama->save();
        Alert::success('Data berhasil diupdate', 'Selamat')->autoclose(3000);
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        nama::where('id', $request->id)->delete();
        Alert::success('Data berhasil dihapus', 'Selamat')->autoclose(3000);
        return redirect('/');
    }
}
