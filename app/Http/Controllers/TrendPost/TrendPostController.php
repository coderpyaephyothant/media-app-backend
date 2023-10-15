<?php

namespace App\Http\Controllers\TrendPost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    public function index(){
        return view('admin.trendPost.index');
    }
}
