<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:post-list');
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $post = new Post();
        if ($request->hasFile('image')) {
           // dd('it woork');
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $post->image = $fileName;
        }
        $post->content = $request->content;
        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/posts')->with('success',__('Post Added Successfully'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        if ($request->hasFile('image')) {
            // dd('it woork');
            $dir = 'uploads/';
            if ($request->image != '' && File::exists($dir . $post->image))
            {
                File::delete($dir . $post->image);
            }
             $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
             $fileName = str_random() . '.' . $extension; // rename image
             $request->file('image')->move($dir, $fileName);
             $post->image = $fileName;
         }
         $post->content = $request->content;
         $post->title = $request->title;
         //$post->user_id = Auth::user()->id;
         $post->save();


        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $image_path = "uploads/$post->image";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            //dd($image_path);
            File::delete($image_path);
        }
        $post->delete($post->id);


        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
