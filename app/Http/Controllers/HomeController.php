<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meta;
use App\Post;
use App\Partner;

class HomeController extends Controller
{
    public function index()
    {
    	// \Artisan::call('storage:link');
        return view('guest.home.index', [
            'posts' => Post::orderBy('created_at', 'desc')->limit(3)->get(),
            'partners' => Partner::orderBy('updated_at', 'desc')->get(),
            'visi' => Meta::where('meta_name', 'visi')->first(),
            'misi' => Meta::where('meta_name', 'misi')->first(),
        ]);
    }
}
