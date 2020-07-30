<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        return view('pages.home');
    }
    public function test()
    {
        return 'This is Test TEXT';
    }
    public function dynamic($id,$name)
    {
        return 'This is Test dynamic TEXT -'.$id.' Name '.$name;
    }
    /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('auth');
    }


     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
