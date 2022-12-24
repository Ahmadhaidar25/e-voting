<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    
    public function login()
    {
        return view('login.login');
    }

    public function masuk(Request $req)
    {
      if($req->username==null){
        alert()->warning('Peringatan','Nip/Npm harus di inputkan');
        return redirect()->back();
    }elseif ($req->password==null) {
        alert()->warning('Peringatan','password harus di inputkan');
        return redirect()->back();
    }else{
     $credentials = $req->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

     if (Auth::attempt($credentials)) {
        if (auth()->user()->role==1) {
           $req->session()->regenerate();
           toast('berhasil','success');
           return redirect()->intended('home');
       }elseif (auth()->user()->role==2) {
        $req->session()->regenerate();
        toast('berhasil','success');

        return redirect()->intended('index');
    }
}

}
toast('user tidak ditemukan','error');

return redirect('/');


}

public function keluar()
{
    Auth::logout();
    toast('berhasil','success');
    return redirect('/');
}
}
