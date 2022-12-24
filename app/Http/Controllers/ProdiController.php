<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prodi;
use DB;

class ProdiController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
}

public function prodi()
{
    $data = prodi::Orderby('id', 'desc')->get();
    return view('admin.prodi',compact('data'));
}

public function tambah_prodi(Request $request)
{
 $request->validate([
    'nama_prodi[]'=> 'required'
]);

 foreach ($request->nama_prodi as  $value) {
     $post = new prodi;
     $post->nama_prodi = $value;
     toast('data berhasil ditambhakan','success');
     $post->save();
 }
 return redirect()->back();
}

public function update_prodi(Request $request, $id)
{
 if ($request->nama_prodi==null) {
    alert()->warning('Peringatan','nama prodi tidak boleh kosong');
    return redirect()->back();
}else{

 $post =  prodi::find($id);
 $post->nama_prodi = $request->nama_prodi;
 toast('prodi berhasil diubah','success');
 $post->update();

 return redirect()->back();
}
}

public function hapus_prodi($id)
{
    $hapus = prodi::find($id);
    $hapus->delete();
    toast('prodi berhasil dihapus','success');
    return redirect()->back();
}
}
