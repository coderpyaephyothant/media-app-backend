<?php

namespace App\Http\Controllers\List;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index(){
        $userList =  DB::table('users')
        ->select('name','email','phone_number','address','image')
        ->get();
        return view('admin.list.index',compact('userList'));
    }
}
