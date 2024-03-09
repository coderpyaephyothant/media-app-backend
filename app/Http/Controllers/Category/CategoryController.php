<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categoryList =  DB::table('categories')
        ->select('category_id','title','description','image',)
        ->get();
        return view('admin.category.index',compact('categoryList'));
    }

    // Detail
    public function detail(Request $request){
        $cats = Category::get();
        return view('admin.category.detail',compact('cats'));
    }
    // Create
    public function createCategory(Request $request){
        $validator  = Validator::make($request->all(), [
            'cName'  => 'required|max:255',
            'desc' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $postData = [
            'title' => $request->cName,
            'description' => $request->desc
            ];
            Category::create($postData);
            $categoryList = Category::get();
            return view('admin.category.index',compact('categoryList')); 
        }
    }
}
