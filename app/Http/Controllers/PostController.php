<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
 
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('post.Index', ['posts' => Post::all(), 'categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('cover')):
            $imgname = $request->cover->store('/');
        endif;

        $post = auth()->user()->posts()->create([
            'slug'  =>  Str::slug($request->title, '-'),
            'title' =>  $request->title,
            'body'  =>  $request->body,
            'html'  =>  $request->html,
            'react' =>  $request->react,
            'vue'   =>  $request->vue,
            'img'   =>  $imgname ? $imgname : null
        ]);

        $post->categories()->attach($request->cat);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.Update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Post::find($request->id)->delete();
        return back();
    }

    //API --------------------------------------------------------------

    public function getAll(Post $post){

        return response($post->
            with('categories')
            ->latest()
            ->get(), 200);
    }

    public function getOne($post){

        $post = Post::find($post);

        if($post != null): 
            return response($post, 200);
        else: 
            return response(['error' => 'not found'], 404);
        endif;
    }
}
