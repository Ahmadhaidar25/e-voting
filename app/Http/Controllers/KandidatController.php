<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kandidat;
use App\Models\prodi;
use Illuminate\Support\Facades\File;

class KandidatController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }
    
  public function kandidat()
  {
    $prodi1 = prodi::all();
    $prodi2 = prodi::all();
    $record = kandidat::all()->count();
    $data = kandidat::all();
    return view('admin.kandidat',compact('prodi1','prodi2','data','record'));
  }

  public function tambah_kandidat(Request $request)
  {
    if ($request->npm_calon_ketua==null) {
      alert()->warning('Peringatan','npm calon ketua harus diisi');
      return redirect()->back();
    }elseif ($request->npm_calon_wakil_ketua==null) {
      alert()->warning('Peringatan','npm calon wakil ketua harus diisi');
      return redirect()->back();
    }elseif ($request->prodi_ketua==null) {
      alert()->warning('Peringatan','prodi calon wakil ketua harus diisi');
      return redirect()->back();
    }elseif ($request->prodi_wakil_ketua==null) {
      alert()->warning('Peringatan','prodi calon wakil ketua harus diisi');
      return redirect()->back();
    }elseif ($request->nama_calon_ketua==null) {
      alert()->warning('Peringatan','nama calon wakil ketua harus diisi');
      return redirect()->back();
    }elseif ($request->nama_calon_wakil_ketua==null) {
      alert()->warning('Peringatan','nama calon wakil ketua harus diisi');
      return redirect()->back();
    }elseif ($request->foto_ketua==null) {
      alert()->warning('Peringatan','foto calon ketua harus upload');
      return redirect()->back();
    }elseif ($request->foto_wakil==null) {
      alert()->warning('Peringatan','foto calon wakil ketua harus upload');
      return redirect()->back();
    }elseif ($request->visi==null) {
      alert()->warning('Peringatan','visi harus diisi');
      return redirect()->back();
    }elseif ($request->misi==null) {
      alert()->warning('Peringatan','misi harus diisi');
      return redirect()->back();
    }else{


      $post = new kandidat;
      $post->npm_calon_ketua = $request->npm_calon_ketua;
      $post->npm_calon_wakil_ketua = $request->npm_calon_wakil_ketua;
      $post->prodi_ketua = $request->prodi_ketua;
      $post->prodi_wakil_ketua = $request->prodi_wakil_ketua;
      $post->nama_calon_ketua = $request->nama_calon_ketua;
      $post->nama_calon_wakil_ketua = $request->nama_calon_wakil_ketua;
      $post->visi = $request->visi;
      $post->misi = $request->misi;

      if ($request->hasfile('foto_ketua')) 
      {
       $destination = '/foto_ketua/'.$post->foto_ketua;

       if (File::exists($destination)) 
       {
         File::delete($destination);
       }

       $file = $request->file('foto_ketua');
       $extention = $file->getClientOriginalExtension();
       $filename = time().'.'.$extention;
       $file->move('foto_calon_ketua', $filename);
       $post->foto_ketua = $filename;
     }

     if ($request->hasfile('foto_wakil')) 
     {
      $destination = '/foto_wakil/'.$post->foto_wakil;

      if (File::exists($destination)) 
      {
        File::delete($destination);
      }

      $file = $request->file('foto_wakil');
      $extention = $file->getClientOriginalExtension();
      $filename = time().'.'.$extention;
      $file->move('foto_calon_wakil_ketua', $filename);
      $post->foto_wakil = $filename;
    }
    toast('Kandidat berhasil di tambahkan','success');
    $post->save();
    return back();
  }

}

public function hapus_kandidat($id)
{
  $hapus =  kandidat::find($id);
  $file1 = public_path('/foto_calon_ketua/').$hapus->foto_ketua;
  $file2 = public_path('/foto_calon_wakil_ketua/').$hapus->foto_ketua;

  if (file_exists($file1)) 
  {
   @unlink($file1);
 }

 elseif (file_exists($file2)) {
   @unlink($file2);
 }
 toast('Kandidat berhasil hapus','success');
 $hapus->delete();
 return back();
}


public function edit_kandidat($id)
{
 $edit = kandidat::find($id);
 $prodi1 = prodi::all();
 $prodi2 = prodi::all();
 return view('admin.edit.edit-kandidat',compact('edit','prodi1','prodi2'));
}

public function ubah_kandidat(Request $request, $id)
{
 if ($request->npm_calon_ketua==null) {
  alert()->warning('Peringatan','npm calon ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->npm_calon_wakil_ketua==null) {
  alert()->warning('Peringatan','npm calon wakil ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->prodi_ketua==null) {
  alert()->warning('Peringatan','prodi calon wakil ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->prodi_wakil_ketua==null) {
  alert()->warning('Peringatan','prodi calon wakil ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->nama_calon_ketua==null) {
  alert()->warning('Peringatan','nama calon wakil ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->nama_calon_wakil_ketua==null) {
  alert()->warning('Peringatan','nama calon wakil ketua tidak boleh kosong');
  return redirect()->back();
}elseif ($request->visi==null) {
  alert()->warning('Peringatan','visi tidak boleh kosong');
  return redirect()->back();
}elseif ($request->misi==null) {
  alert()->warning('Peringatan','misi tidak boleh kosong');
  return redirect()->back();
}else{
  $post = kandidat::find($id);
  $post->npm_calon_ketua = $request->npm_calon_ketua;
  $post->npm_calon_wakil_ketua = $request->npm_calon_wakil_ketua;
  $post->prodi_ketua = $request->prodi_ketua;
  $post->prodi_wakil_ketua = $request->prodi_wakil_ketua;
  $post->nama_calon_ketua = $request->nama_calon_ketua;
  $post->nama_calon_wakil_ketua = $request->nama_calon_wakil_ketua;
  $post->visi = $request->visi;
  $post->misi = $request->misi;

  if ($request->hasfile('foto_ketua')) 
  {
   $destination = '/foto_ketua/'.$post->foto_ketua;

   if (File::exists($destination)) 
   {
     File::delete($destination);
   }

   $file = $request->file('foto_ketua');
   $extention = $file->getClientOriginalExtension();
   $filename = time().'.'.$extention;
   $file->move('foto_calon_ketua', $filename);
   $post->foto_ketua = $filename;
 }

 if ($request->hasfile('foto_wakil')) 
 {
  $destination = '/foto_wakil/'.$post->foto_wakil;

  if (File::exists($destination)) 
  {
    File::delete($destination);
  }

  $file = $request->file('foto_wakil');
  $extention = $file->getClientOriginalExtension();
  $filename = time().'.'.$extention;
  $file->move('foto_calon_wakil_ketua', $filename);
  $post->foto_wakil = $filename;
}
toast('Kandidat berhasil di ubah','success');
$post->update();
return back();

}
}



}




