<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Displays all posts available by id, title and content
     */
    public function index()
    {
        $posts = Post::all(['id', 'title', 'content']);
        return response()->json($posts);
    }

    /**
     * Posts a new post to store
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->json()->all();
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        return response()->json([
            'message' => 'Post created successfully',
        ], 201);
    }

    /**
     * Displays a specific post given by url
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message'=> 'Unable to find post'],404);
        }
        return response()->json($post);
    }


    /**
     * Updates the specific post id 
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message'=> 'No such id'],404);
        }
        //i only want to update title and content
        $postData = $request->only('title', 'content');
        $post->update($postData);
        return response() ->json(['message','Successfully updated']);
    }

    /**
     * Removes a specific post by id
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message'=> 'No such id'],404);
        }
        $post->delete();
        return response() ->json(['message','Post deleted']);
    }
}
