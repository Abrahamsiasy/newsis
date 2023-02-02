<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        //dd(Auth::user()->id);
        if(Auth::user()->rol_id == 1){
            return redirect()->route('rec');
         } elseif (Auth::user()->rol_id == 2) {
            return redirect()->route('doctor');
         } elseif(Auth::user()->rol_id == 3) {
            return redirect()->route('lab');
         } 
    }
}
