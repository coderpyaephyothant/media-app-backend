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

    // search posts
    public function searchPosts(Request $request){
        $searchedKeywards = $request->search;
        $data = Post::where('title','like','%'.$searchedKeywards.'%')
                        ->orWhere('description', 'like', '%' . $searchedKeywards . '%')->get();
        return response()->json([
            'posts' => $data
        ]);
    }

    // filtered By Catergory
    public function filteredByCategory(Request $request){
        $searchedID = $request->filteredByCategory;
        $posts = Post::where('category_id', $searchedID)->get();
        return response()->json([
            'post' => $posts
        ]);
    }
}
