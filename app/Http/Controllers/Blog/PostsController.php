<?php

namespace App\Http\Controllers\Blog;
use App\Post;
use App\Category;
use App\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post){
        return view('blog.show')->with('post',$post);
    }
    
    public function category(Category $category){
    
        $posts = $category->posts()->searched()->simplePaginate(2);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.category', compact('category', 'posts', 'categories', 'tags'));
    }


    public function tag(Tag $tag){
        $posts = $tag->posts()->searched()->simplepaginate(2);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.tag', compact('tag', 'posts', 'categories', 'tags'));
    }
}
