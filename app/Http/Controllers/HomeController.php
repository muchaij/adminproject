<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->role ==1){
            //return redirect()->to('admin/home');
        }
        if(\Auth::user()->role ==2){
            //return redirect()->to('singer/home');
        }
        return view('backend.home');
    }
}
