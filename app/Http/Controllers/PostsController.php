<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    
    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // upload the image to storage
        $image = $request->image->store('posts');
        //Create the post
        $post = Post::Create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => "storage/".$image,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        //Flash message
        session()->flash('success', 'Post Created Successfully');

        //Redirect the user
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
        return view('posts.create')->with('post',$post)->with('categories', Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        //fetching request data using only() instead of all() for security reasons
        $data = $request->only(['title','description','published_at','content','category_id']);

        //check if there's a new image 
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            
            //delete old image
            $post->deleteImage();

            //adding new image to data
            $data['image'] = "storage/".$image;
        }

       if($request->tags){
           $post->tags()->sync($request->tags);
       }

        //update attributes
        $post->update($data);

        //flash message
        session()->flash('success','Post Updated Successfully.');
        
        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }else{
            $post->delete();
        }
        
        session()->flash('success','Post Trashed Successfully');
        
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        /**
         * the 'trashed'=>true   is to decide whether to display ''No Posts Yet' or 'No Trashed Posts'
         */

        return view('posts.index')->with(['posts'=>$trashed,'trashed'=>true]);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        
        $post->restore();

        session()->flash('success','Post Restored Successfully');

        return redirect()->back();
    }
}
