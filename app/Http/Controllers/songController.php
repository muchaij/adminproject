<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Models\Song;

class songController extends Controller
{
    public function sIndex(){

        return view('backend.songs');
    }
    public function insertSong(Request $request){
         //$name = $request['soname'];
         //return $name;
         //return json_encode($request->all());
        if(DB::table('songs')->insert(['sname'=>$request->soname,'stitle'=>$request->stitle,'genre'=>$request->genre,
        'country_origin'=>$request->corigin,'artist_name'=>$request->artist ])){
            return back()->with('success', 'Song inserted successfully!');
        }else{
            return back()->with('error', 'Unable to Save');
        }
      


    }
}
