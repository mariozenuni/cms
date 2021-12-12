<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request )
    {

       

    

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image->store('posts'),
            'published_at'=>$request->published_at
        ]);

    

        session()->flash('success','Posts successfully created');

        return redirect(route('posts.index'));
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
    public function edit($id)
    {
        //
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
    public function destroy($post)

    {
        
         $post=Post::withTrashed()
         ->where('id',$post)
         ->firstOrFail();

        //dd($post);

       if($post->trashed()){
        
        Storage::delete($post->image);

            $post->forceDelete();

        }else{
            $post->delete();
        }

        

        session()->flash('success','Posts deleted');   
        
         
         return redirect(route('posts.index'));     //
    }

      /**
     * Display a listing of the resource trashed.
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function trashed(){


        $trashed=Post::onlyTrashed()->get();

        return view('posts.index')->with('posts',$trashed);

    }
}
