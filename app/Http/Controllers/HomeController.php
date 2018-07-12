<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meta;
use App\Post;
use App\Partner;

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
    public function index()
    {
        return view('guest.home.index', [
            'posts' => Post::orderBy('created_at', 'desc')->limit(3)->get(),
            'partners' => Partner::orderBy('updated_at', 'desc')->get(),
            'visi' => Meta::where('meta_name', 'visi')->first(),
            'misi' => Meta::where('meta_name', 'misi')->first(),
        ]);
    }
}
