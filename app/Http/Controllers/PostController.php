<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',['posts'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img->store('images','public'),
            'category_id'=>$request->category_id,
        ]);
        session()->flash('success','Post Added Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $next = Post::where('id' , '>' , $post->id)->min('id');
        $prev = Post::where('id' , '<' , $post->id)->max('id');

        return view('post',[
            'post' => $post,
            'categories' => Category::all(),
            'next'=> Post::find($next),
            'prev'=> Post::find($prev),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create',['post'=>$post,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->only(['name','description']);
        if ($request->hasFile('img'))
        {
            $img = $request->img->store('images','public');
            Storage::disk('public')->delete($post->img);
            $data['img'] = $img;
        }
        $post->update($data);
        session()->flash('success','Post Updated successfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
         session()->flash('success','Post Deleted successfuly');
         return redirect(route('posts.index'));
    }

}
