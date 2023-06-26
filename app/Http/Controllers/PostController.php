<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::getPosts();
    }

    public function show($id)
    {
        return Post::getPostById($id);
    }

    public function store(Request $request)
    {
        return Post::storePost($request);
    }

    public function update(Request $request, $id)
    {
        return Post::updatePost($request, $id);
    }

    public function destroy($id)
    {
        return Post::deletePost($id);
    }
}
