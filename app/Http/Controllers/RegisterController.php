<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

  public function __construct()
   {
    $this->middleware('guest');
}
    public function register()
    {
        return view('login.register');
    }

    public function daftar_akun(Request $req)
    {
        if ($req->nama==null) {
           alert()->warning('Peringatan','maaf nama harus diisi');
           return redirect()->back();
       }elseif ($req->email==null) {
          alert()->warning('Peringatan','maaf email harus diisi');
          return redirect()->back();
      }elseif ($req->jk==null) {
          alert()->warning('Peringatan','maaf jenis kelamin harus dipilih');
          return redirect()->back();
      }elseif ($req->no_tlp==null) {
          alert()->warning('Peringatan','maaf no telepon harus harus diisi');
          return redirect()->back();
      }elseif ($req->username==null) {
          alert()->warning('Peringatan','maaf npm atau nip harus harus diisi');
          return redirect()->back();
      }elseif ($req->password==null) {
          alert()->warning('Peringatan','maaf password harus harus diisi');
          return redirect()->back();
      }else{

        $req->validate([
          'nama' => 'required',
          'email' => 'required|unique:users',
          'jk' => 'required',
          'no_tlp' => 'required|unique:users',
          'username' => 'required|unique:users',
          'password' => 'required',
          'role' => 'required',
      ]);

        $post = new User;
        $post->nama = $req->nama;
        $post->email = $req->email;
        $post->jk = $req->jk;
        $post->no_tlp = $req->no_tlp;
        $post->username = $req->username;
        $post->password = Hash::make($req->password);
        $post->role = $req->role;
        $post->save();
        alert()->success('Berhasil','akun anda telah terdaftar');
        return redirect('/');

    }


}
}
