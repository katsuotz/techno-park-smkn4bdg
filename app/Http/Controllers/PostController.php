<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

	public function index($page = 1)
	{
		$per_page = 12;
		$skip = ($page - 1) * $per_page;

		$posts = Post::select('id', 'title', 'image', 'created_at', 'slug')
						->orderBy('created_at', 'desc');

		$count = $posts->count();
		$posts = $posts->skip($skip)->take($per_page);
		$total_page = (int) ceil($count / $per_page);

		return view('guest.post.index', [
			'posts' => $posts->get(),
			'total_page' => $total_page,
			'per_page' => $per_page,
			'current_page' => $page,
			'total_posts' => $count,
			'this_page' => $posts->count(),
		]);
	}

	public function show(Post $post_slug)
	{
		$posts = Post::select('id', 'title', 'image', 'created_at', 'slug')
						->where('id', '!=', $post_slug->id)
						->orderBy('created_at', 'desc')
						->take(5);

		return view('guest.post.show', [
			'post' => $post_slug,
			'posts' => $posts->get(),
		]);
	}
}
