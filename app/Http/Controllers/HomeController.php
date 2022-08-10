<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active='dashboard';
        
        return view('home',compact("active"));
    }

    public function welcome()
    {
        $active='Peta';
        $rs=Perumahan::where('wkt','<>','')->where('status','=','BAST FISIK')->get();
       // dd($rs);
        return view('welcome', compact("rs"));
    }

   
}
