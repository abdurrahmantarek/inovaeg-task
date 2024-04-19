<?php

namespace App\Services;

use App\Models\Post;

class ReviewService {

    public function addPostReview($post, $data)
    {
        return $post->reviews()->create([
            'user_id' => $data['user_id'],
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);
    }
}
