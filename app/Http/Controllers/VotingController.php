<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kandidat;
use App\Models\voting;
use Auth;
use Illuminate\Support\Facades\Input;

class VotingController extends Controller
{

 public function __construct()
 {
  $this->middleware('auth');
}
public function voting()
{
 $data = kandidat::all();
 return view('e-voting.voting',compact('data'));
}

public function post_voting(Request $request)
{
  $request->validate([ 
    'user_id' => 'required|unique:voting', 
  ]);
  $vo = new voting;
  $vo->user_id = $request->user_id;
  $vo->kandidat_id = $request->kandidat_id;
  $vo->save();

  toast('anda berhasil memilih','success');
  return redirect()->back();
}
}
