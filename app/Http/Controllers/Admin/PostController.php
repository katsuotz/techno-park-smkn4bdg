<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => str_replace('\\', '/', $request->featured_image_path),
                'created_at' => $request->date ? \Carbon\Carbon::createFromFormat('d/m/Y', $request->date) : \Carbon\Carbon::now(),
                'slug' => str_slug($request->title)
            ]);

            DB::commit();

            return redirect()->route('posts.index')->with('success', 'Your post has already been published.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.form', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->image = str_replace('\\', '/', $request->featured_image_path);
            $post->created_at = $request->date ? \Carbon\Carbon::createFromFormat('d/m/Y', $request->date) : \Carbon\Carbon::now();
            $post->save();

            DB::commit();

            return redirect()->route('posts.index')->with('success', '<b>' . $post->title . '</b> has already been updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['Internal Server Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();

        try {
            $post->delete();
            DB::commit();

            return response()->json([
                'status' => true,
                'msg' => 'success'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'msg' => 'error'
            ], 400);
        }
    }

    public function get(Request $request)
    {
        $length = $request->length;
        $start = $request->start;
        $search = $request->search['value'];

        $columns = $request->columns;
        $order = $request->order;

        $order_col = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        // return response()->json($request->all());

        $result = new Post;

        if ($search) {
            $search = str_replace(asset(''), '', $search);
            $result = $result->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orwhere('content', 'like', '%' . $search . '%')
                      ->orwhere('slug', 'like', '%' . $search . '%');
            });
        }


        $result = $result->orderBy($columns[$order_col]['data']['_'], $order_dir);

        $count = $result->count();
        $result = $result->take($length);
        $result = $result->skip($start);

        return response()->json([
            'recordsTotal' => $result->count(),
            'recordsFiltered' => $count,
            'data' => $result->get(),
        ]);
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:30',
            'content' => 'required',
        ];
    }
}
