<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class songController extends Controller
{
    public function sIndex(){

        return view('backend.songs');
    }
}
