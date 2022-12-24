<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voting;
use App\Models\kandidat;
use ConsoleTVs\Charts\Facades\Charts;

class HomeCotroller extends Controller
{

   public function __construct()
   {
    $this->middleware('auth');
}
public function home()
{
   $data = kandidat::all();

        // Looping semua post
   foreach ($data as $post) {
            // Menghitung jumlah komentar di setiap post
    $commentCount = voting::where('kandidat_id', $post->id)->count();
}

return view('admin.home',compact('post','commentCount','data'));
}

public function index()
{
       // Mengambil semua post
    $data = kandidat::all();

        // Looping semua post
    foreach ($data as $post) {
            // Menghitung jumlah komentar di setiap post
        $commentCount = voting::where('kandidat_id', $post->id)->count();
    }

    return view('user.index',compact('data','post','commentCount'));

}
}
