<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use session;
use Auth;

class ResetController extends Controller
{
   public function lupa_password()
   {
    return view('reset.reset-password');
} 

public function post_reset_password(Request $request)
{
    $request->validate([
      'email' => 'required|email|exists:users',
  ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => $request->email, 
      'token' => $token, 
      'created_at' => Carbon::now()
  ]);

    Mail::send('reset.forgetPassword', ['token' => $token], function($message) use($request){
      $message->to($request->email);
      $message->subject('Reset Password');
  });

    alert()->success('Berhasil','silahkan priksa email anda');
    return back();
}


public function reset_password_get($token) { 
    return view('reset.change-password', ['token' => $token]);
}

public function change_password_post(Request $request)
{
 if ($request->email==null) {
    alert()->success('Email tidak boleh kosong');
    return redirect()->back();
}elseif ($request->password==null) {
    alert()->success('Password tidak boleh kosong');
    return redirect()->back();
}elseif ($request->password_confirmation==null) {
    alert()->success('konfirmasi tidak boleh kosong');
    return redirect()->back();
}else{

    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|string|confirmed',
    ]);

    $updatePassword = DB::table('password_resets')
    ->where([
        'email' => $request->email, 
        'token' => $request->token
    ])
    ->first();

    if(!$updatePassword){
        return back()->withInput()->with('error', 'Invalid token!');
    }

    $user = User::where('email', $request->email)
    ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();
    alert()->success('Password','berhasil di reset');
    return redirect('/');
}
}

}
