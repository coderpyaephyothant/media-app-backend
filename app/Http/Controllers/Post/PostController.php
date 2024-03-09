<?php

namespace App\Http\Controllers\Post;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Index
    public function index(Request $request){
        $catDropdown = Category::get();
        $posts = Post::get();
        return view('admin.post.index',compact('posts','catDropdown'));
    }

    // Create
    public function createPost(Request $request){
        $validator  = Validator::make($request->all(), [
            'cId'  => 'required',
            'cName'  => 'required|max:255',
            'desc' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $postData = [
                'category_id' => $request->cId,
                'title' => $request->cName,
                'description' => $request->desc
            ];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_ppt_' . $image->getClientOriginalExtension();
                File::makeDirectory(public_path('uploads'), $mode = 0777, true, true);
                $image->move(public_path('uploads'), $imageName);
                $postData['image'] = $imageName;
            }
            Post::create($postData);
            $posts = Post::get();
            $catDropdown = Category::get();
            return view('admin.post.index',compact('posts','catDropdown')); 
        }
    }

    // Detail
    public function detail(Request $request, $id){
        $postById = Post::where('post_id',$id)->first();
        $categoryById = Category::where('category_id',$postById->category_id)->first();
        $category_name=$categoryById ? $categoryById->title : '';
        $catDropdown = Category::get();
        return view('admin.post.detail',compact('postById','category_name','catDropdown'));
    }

    // updateDetail
    public function updateDetail(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'cId'  => 'required',
            'cName'  => 'required|max:255',
            'desc' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request->all());

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
    $editedPostData = [
        'category_id' => $request->cId,
        'title' => $request->cName,
        'description' => $request->desc,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
    // dd($editedPostData);
    if (isset($request->image)) {
        $oldData = Post::where('post_id', $id)->first();
        $oldImg = $oldData['image'];
        if(File::exists(public_path().'/uploads/'.$oldImg)){
            File::delete(public_path().'/uploads/'.$oldImg);
        }
        $file = $request->file('image');
                $newImage = time().'_ppt_'. $file->getClientOriginalName();
                $file->move(public_path().'/uploads/',$newImage);
                $editedPostData['image'] = $newImage;
    }
    Post::where('post_id',$id)->update($editedPostData);
    $postById = Category::where('category_id',$id)->first();
    $category_name=$postById ? $postById->title : '';
    $catDropdown = Category::get();
        return redirect()->route('admin#postDetail', ['id' => $id])->with(compact('postById', 'category_name', 'catDropdown'));
    }
}
