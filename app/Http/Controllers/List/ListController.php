<?php

namespace App\Http\Controllers\List;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function index(){
        $userList =  DB::table('users')
        ->select('id','name','email','phone_number','address','image')
        ->get();
        return view('admin.list.index',compact('userList'));
    }

    // destory account
    public function destory(Request $request){
        $toDeleteId = $request->id;
        $hasUser = User::find($toDeleteId);
        $isLoginUser = Auth::user()->id;
        if ($isLoginUser == $toDeleteId) {
            session()->flash('unsuccessListDelete','Logined Account cannot delete itself!Please try again later!');
            return back();
        }else{
            if($hasUser){
                $hasUser->delete();
                session()->flash('successListDelete','Selected account is successfully has been Deleted!');
                return back();
            }
        }
    }
    
// admin search
public function search(Request $request){
    $searchedValue = $request->search_item;
    $userList = DB::table('users')
                ->where('name', 'like', '%'.$searchedValue . '%')
                ->orWhere('email', 'like', '%'.$searchedValue . '%')
                ->orWhere('address', 'like', '%'.$searchedValue . '%')
                ->orWhere('phone_number', 'like', '%'.$searchedValue . '%')
                ->get();
                return view('admin.list.index',compact('userList'));
   }
   
}
