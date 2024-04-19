<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPosts(User $user, Request $request, PostService $postService)
    {
        $posts = $postService->getPostsByUserIdPaginated($user->id);

        return response()->json($posts);
    }
}
