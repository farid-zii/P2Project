<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class SiswaController extends Controller
{
    public function read(){
        $siswa = DB::table('siswa')->orderBy('id','DESC')->get();
        return view('admin.siswa.index',['siswa'=>$siswa]);
    }

    public function add(){
    	return view('admin.siswa.tambah');
    }

    public function create(Request $request){
        $dokumen = $request->file('foto');
          if($request->file('foto') != "") {
            $name = uniqid().".png";
            $dokumen->move(public_path() . "/images/siswa", $name);
            DB::table('siswa')->insert([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'jekel' => $request->jekel,
                'contact' => $request->contact,
                'alamat' => $request->alamat,
                'foto' => $name]);
          } else {
            DB::table('siswa')->insert([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'jekel' => $request->jekel,
                'contact' => $request->contact,
                'alamat' => $request->alamat,]);
          }

          DB::table('users')->insert([
            'username' => $request->nis,
            'password' => bcrypt('MTCNN2022'),
            'name' => $request->nama,
            'level' => '2']);

        return redirect('/admin/siswa')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $siswa= DB::table('siswa')->where('id',$id)->first();
        return view('admin.siswa.detail',['siswa'=>$siswa]);
    }

    public function edit($id){
        $siswa= DB::table('siswa')->where('id',$id)->first();
        return view('admin.siswa.edit',['siswa'=>$siswa]);
    }

    public function update(Request $request, $id) {
        $siswa= DB::table('siswa')->where('id',$id)->first();
        $dokumen = $request->file('foto');
        if($request->file('foto') != "") {
            $name = uniqid().".png";
            unlink(public_path() . '/images/siswa/' . $siswa->foto);
            $dokumen->move(public_path() . "/images/siswa", $name);
            DB::table('siswa')
                ->where('id', $id)
                ->update([
                    'nis' => $request->nis,
                    'nama' => $request->nama,
                    'jekel' => $request->jekel,
                    'contact' => $request->contact,
                    'alamat' => $request->alamat,
                    'foto' => $foto]);
        } else {
            DB::table('siswa')
                ->where('id', $id)
                ->update([
                    'nis' => $request->nis,
                    'nama' => $request->nama,
                    'jekel' => $request->jekel,
                    'contact' => $request->contact,
                    'alamat' => $request->alamat]);
        }
        return redirect('/admin/siswa')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $siswa= DB::table('siswa')->find($id);
        File::delete('images/siswa/'.$siswa->foto);
        DB::table('siswa')->where('id',$id)->delete();
        return redirect('/admin/siswa')->with("success","Data Berhasil Didelete !");
    }
}
