<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Index
    public function index(){
        $loginUserId = Auth::user()->id;
        $loginUserData = User::select('name','email','phone_number','address','image')->where('id',$loginUserId)->first();
        return view('admin.profile.index',compact('loginUserData'));
    }
// Profile Data Update
    public function update(Request $request){
        $validator  = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            // 'password' =>'nullable|min:6|max:255',
            'phone_number' => 'nullable|min:7|max:15',
            'address' => 'nullable|max:255'
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $userId = Auth::user()->id;
        $userPassword = Auth::user()->password;
        $updatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number?$request->phone_number:'',
            // 'password' => $request->password?$request->password:$userPassword,
            'address' => $request->address?$request->address:''
        ];
       $updatedUser =  User::where('id',$userId)->update($updatedData);
        return back()->with(['successProfileUpdate'=>'Addmin Account has been updated !']);
    }
    // changePassword Index
    public function changePasswrod(){
        return view('admin.profile.changePassword');
    }
    // updatedPassword 
    public function updatedPasswrod(Request $request){
        $userPassword = Auth::user()->password;
        $validator  = Validator::make($request->all(), [
            'oldPassword'  => 'required|max:255|min:7',
                'newPassword' => 'required|max:255|min:7',
                'confirmPassword' => 'required|max:255|min:7',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $newPassword = Hash::make($request->newPassword);
        if(Hash::check($request->oldPassword , auth()->user()->password)) {
            if(Hash::check($request->oldPassword , $newPassword)){
                session()->flash('sameOldPassword','Same with Old Password!Create New Password Again!');
                return back();
            }else{
                // dd(Hash::make($request->newPassword),Hash::make($request->confirmPassword));
                if(Hash::check($request->confirmPassword , $newPassword)){
                    $confirmedData = [
                        'password' =>$newPassword,
                    ];
                    $userId = Auth::user()->id;
                   $updatedUserPassword =  User::where('id',$userId)->update($confirmedData);
                    return back()->with(['successPasswordUpdate'=>'Addmin Password has been updated !']);
                }else {
                    session()->flash('differentNewAndConfirmedPassword','Please Type Same Password With New Password!');
                   return redirect()->back();
                }
            }
        }else{
            session()->flash('oldMessageDoesNotMatched','Did Forgot Your Current Password?Try Again!');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
