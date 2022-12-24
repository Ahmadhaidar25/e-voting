<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\prodi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
}
public function profil()
{
    $get = User::where('id',Auth::user()->id)->first();
    $prodi = prodi::all();
    return view('user.profil',compact('get','prodi'));
}

public function ubah_foto(Request $request)
{
    $id_user = Auth::user()->id;
    $user = User::find($id_user);
    if ($request->hasfile('foto')) 
    {
        $destination = '/foto/'.$user->foto;

        if (File::exists($destination)) 
        {
         File::delete($destination);
     }

     $file = $request->file('foto');
     $extention = $file->getClientOriginalExtension();
     $filename = time().'.'.$extention;
     $file->move('image_avatar', $filename);
     $user->foto = $filename;
 }

 toast('foto berhasil di ubah','success');
 $user->save();
 return back();
}


public function ubah_profil(Request $request)
{
    if ($request->nama==null) {
       alert()->warning('Peringatan !!','nama tidak boleh di kosongkan');
       return redirect()->back();
   }elseif ($request->username==null) {
    alert()->warning('Peringatan !!','username tidak boleh di kosongkan');
    return redirect()->back();
}elseif ($request->email==null) {
    alert()->warning('Peringatan !!','email tidak boleh di kosongkan');
    return redirect()->back();
}elseif ($request->jk==null) {
    alert()->warning('Peringatan !!','jenis kelamin tidak boleh di kosongkan');
    return redirect()->back();
}else{
    $id_user = Auth::User()->id;
    $user = User::find($id_user);

    $user->nama = $request->nama;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->semester = isset($request->semester)? $request->semester : null;
    $user->prodi = $request->prodi;
    $user->jk = $request->jk; 
    $user->no_tlp = isset($request->no_tlp)? $request->no_tlp : null;
    $user->alamat = isset($request->alamat)? $request->alamat : null;

    toast('profil berhasil di ubah','success');
    $user->save();
    return redirect()->back();
}
}

public function admin_profil($value='')
{
    $get = User::where('id',Auth::user()->id)->first();
    return view('admin.profil',compact('get'));
}

public function ubah_password(Request $request)
{
    if ($request->current_password==null) {
        alert()->warning('Peringatan','password lama tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->password==null) {
        alert()->warning('Peringatan','password baru tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->password_confirmation==null){
       alert()->warning('Peringatan','konfirmasi password tidak boleh kosong');
       return redirect()->back();
   }
   else{

    $request->validate([
      'current_password' => ['required'],
      'password' => ['required', 'confirmed'],

  ]);

    if (Hash::check($request->current_password, auth()->user()->password)) {
      auth()->user()->update(['password' => Hash::make($request->password)]);
      toast('Password berhasil diubah','success');
      return back();
  }else{
     toast('Password lama tidak sesuai','warning');
     return back();
 }
}

}

}
