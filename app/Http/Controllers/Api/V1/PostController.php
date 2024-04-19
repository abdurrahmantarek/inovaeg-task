<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Post\AddPost;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function topPosts(PostService $postService)
    {
        $posts = $postService->getTopPosts();

        return response()->json($posts);
    }

    public function store(AddPost $addPostRequest, PostService $postService)
    {
        $data = $addPostRequest->validated();

        $post = $postService->addPost($data);

        return response()->json($post, 201);
    }
}
