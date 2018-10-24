<?php

namespace App\Http\Controllers;

use App\Medialibrary;
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
     * @return \Illuminate\Http\Response
     */
    public function index( Medialibrary $media )
    {
        $media = Medialibrary::all()->sortByDesc('id');

        return view('home',compact( 'media' ));
    }
}
