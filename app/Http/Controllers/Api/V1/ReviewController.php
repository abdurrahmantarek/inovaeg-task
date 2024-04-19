<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Review\AddReview;
use App\Models\Post;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(AddReview $addReviewRequest, Post $post, ReviewService $reviewService)
    {
        $data = $addReviewRequest->validated();

        $review = $reviewService->addPostReview($post, $data);

        return response()->json($review, 201);
    }
}
