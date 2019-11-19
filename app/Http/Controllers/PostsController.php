<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Resources\Post as PostResource;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return PostResource::collection($posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = request('title');
        $post->description = request('description');

        if($post->save()){
            return new PostResource($post);
        }else{
            exit("error");
        }

    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Post $post)
    {
        $post->title = request('title');
        $post->description = request('description');

        $post->save();
    }

    public function destroy(Post $post)
    {  
        if($post->delete()){
        return new PostResource($post);
       }
    }
}
