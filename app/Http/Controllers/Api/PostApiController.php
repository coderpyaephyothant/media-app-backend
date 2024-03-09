<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    //get new posts

    public function getNewPosts(Request $request){
        $newPosts = Post::get();
        return response()->json([
            'posts' => $newPosts
        ]);
    }
}
