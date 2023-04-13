<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class BukuController extends Controller
{
    public function read(){
        $buku = DB::table('buku')->orderBy('id','DESC')->get();
        return view('admin.buku.index',['buku'=>$buku]);
    }

    public function add(){
        $buku= DB::table('buku')->orderBy('id','DESC')->get();
    	return view('admin.buku.tambah',['buku'=>$buku]);
    }

    public function create(Request $request){
        DB::table('buku')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'stock' => $request->stock
         ]);
        return redirect('/admin/buku')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $buku= DB::table('buku')->where('id',$id)->first();
        return view('admin.buku.detail',['buku'=>$buku]);
    }

    public function edit($id){
        $buku= DB::table('buku')->where('id',$id)->first();
        return view('admin.buku.edit',['buku'=>$buku]);
    }

    public function update(Request $request, $id) {
        DB::table('buku')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'stock' => $request->stock    ]);

        return redirect('/admin/buku')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $buku= DB::table('buku')->where('id',$id)->first();
        DB::table('buku')->where('id',$id)->delete();

        return redirect('/admin/buku')->with("success","Data Berhasil Didelete !");
    }
}
