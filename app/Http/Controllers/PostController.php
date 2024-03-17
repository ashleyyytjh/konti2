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
     * 
     * @return \Illuminate\Http\JsonResponse Returns a JSON response containing all posts
     */
    public function index()
    {
        $posts = Post::all(['id', 'title', 'content']);
        return response()->json($posts);
    }

    /**
     * Posts a new post to store
     * 
     * @param App\Http\Requests\StorePostRequest
     * @return \Illuminate\Http\JsonResponse Returns a JSON response containing all posts
     */
    public function store(StorePostRequest $request)
    {
        // $data = $request->all();
        // $post = Post::create([
        //     'title' => $data['title'],
        //     'content' => $data['content'],
        // ]);

        return response()->json([
            'message' => 'Post created successfully',
        ], 201);
    }

    /**
     * Displays a specific post given by URL.
     *
     * @param  int $id The ID of the post to retrieve.
     * @return \Illuminate\Http\JsonResponse Returns the post data as JSON if found; otherwise, returns a JSON error message.
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
     * Updates the specific post by ID.
     *
     * @param  UpdatePostRequest $request The form request that validates the incoming data.
     * @param  int $id The ID of the post to update.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with the updated post data and a success message if the update is successful; otherwise, returns a JSON error message.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message'=> 'No such id'],404);
        }
        $postData = $request->only('title', 'content');
        $post->update($postData);
        return response()->json(['data' => $post, 'message' => 'Successfully updated']);
    }

   /**
     * Removes a specific post by ID.
     *
     * @param  int $id The ID of the post to be deleted.
     * @return \Illuminate\Http\JsonResponse Returns a JSON message confirming deletion if successful; otherwise, returns a JSON error message.
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
