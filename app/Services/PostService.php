<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService {

    public function getTopPosts($limit = 10) {

        return Post::with('reviews')
            ->withCount(['reviews as average_rating' => function ($query) {
                $query->select(DB::raw('coalesce(avg(reviews.rating), 0)'));
            }])
            ->orderByDesc('average_rating')
            ->limit($limit)
            ->get();
    }

    public function addPost($data)
    {
        return Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['user_id'],
        ]);
    }

    public function getPostsByUserIdPaginated($userId, $limit = 10)
    {
        $posts = Post::where('user_id', $userId)
            ->paginate($limit);

        return $posts;
    }
}
