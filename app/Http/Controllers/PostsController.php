<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Http\Resources\Post as PostResource;
class PostsController extends Controller
{

    public function index()
    {
        // Get articles
        $posts = Post::paginate(15);
        // Return collection of articles as a resource
        return PostResource::collection($posts);
    }
 
    public function store(Request $request)
    {
        $post = $request->isMethod('put') ? Post::findOrFail($request->id) : new Post;

        $post->id = $request->input('id');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        
        if($post->save()) {
            return new PostResource($post);
        }
        
    }
 
    public function show($id)
    {
        // Get article
        $post = Post::findOrFail($id);
        // Return single article as a resource
        return new PostResource($post);
    }

    public function destroy($id)
    {
        // Get article
        $post = Post::findOrFail($id);
        if($post->delete()) {
            return new PostResource($post);
        }    
    }
}

