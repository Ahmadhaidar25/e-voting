<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;
use App\Events\AddData;

class LikeController extends Controller
{
    public function like(Request $request)
    {

        $vo = new like;
        $vo->user_id = $request->user_id;
        $vo->kandidat_id = $request->kandidat_id;
        $vo->save();

        event(new AddData($vo));
       
        return redirect()->back();
    }
}
