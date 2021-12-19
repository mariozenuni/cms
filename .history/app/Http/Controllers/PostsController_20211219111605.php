<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Models\Delete;
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
    public function edit(Post $post)
    {
         return view('posts.create')->with('post',$post);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request,Post $post)
    {
            $data=$request->only(['title','description','published_at','content']);

        

            if($request->hasFile('image')){
                
                $image=$request->image->store('posts');

                Delete::cancel($post->image));
                //Storage::delete($post->image);

                $data['image']=$image;
            }

            $post->update($data);
           
    
            session()->flash('success','Posts successfully updated');

            return redirect(route('posts.index'));
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