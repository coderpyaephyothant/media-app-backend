<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    // get all categories
    public function getCategories(Request $request){
        $categories = Category::select('Category_id','Title')
        ->get();
        return response()->json(['categories' => $categories]);
    }
}
