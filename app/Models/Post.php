<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;


    public static function getPosts()
    {
        $posts = Post::all();

        $posts->makeHidden('draf_status');

        return okResponse200($posts, "Posts retrived successfully");
    }

    public static function getPostById(int $id)
    {

        try {
            $post = Post::findOrFail($id);

            return okResponse200($post, 'Post retrived successfully');
        } catch (ModelNotFoundException) {
            return notFoundData404("Post not found");
        }
    }

    public static function storePost(Request $request)
    {

        try {

            $request->validate([
                'title' => 'required|string',
                'slug' => 'required|string',
                'content' => 'required|string',
                'author' => 'required|string',
                'publish_date' => 'required|string',
                'draf_status' => 'required|string'
            ]);

            $newPost = new Post;

            $newPost->title = $request->title;
            $newPost->slug = $request->slug;
            $newPost->content = $request->content;
            $newPost->author = $request->author;
            $newPost->publish_date = $request->publish_date;
            $newPost->draf_status = $request->draf_status;

            $newPost->save();

            return resourceCreatedResponse201($newPost, "Post");
        } catch (\Throwable $th) {
            return badRequestResponse400();
        }
    }

    public static function updatePost(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'string',
                'slug' => 'string',
                'content' => 'string',
                'author' => 'string',
                'publish_date' => 'string',
                'draf_status' => 'string'
            ]);

            $post = Post::findOrFail($id);

            if ($request->has('title')) {

                $post->title = $request->title;
            }

            if ($request->has('slug')) {

                $post->slug = $request->slug;
            }

            if ($request->has('content')) {
                $post->content = $request->content;
            }

            if ($request->has('author')) {
                $post->author = $request->author;
            }

            if ($request->has('publish_date')) {
                $post->publish_date = $request->publish_date;
            }

            if ($request->has('draf_status')) {
                $post->draf_status = $request->draf_status;
            }


            $post->update();

            return okResponse200($post, "Post updated succesfully");
        } catch (ModelNotFoundException) {
            return notFoundData404("Post not found");
        }
    }

    public static function deletePost($id)
    {

        try {
            $post = Post::findOrFail($id);

            $post->delete();

            return okResponse200($post, "Post deleted succesfully");
        } catch (ModelNotFoundException) {
            return notFoundData404("Post not found");
        }
    }
}
