<?php

namespace App\Http\Controllers\api;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Validator;

class ActivityLogController extends Controller
{
    //activeLogView
    public function activeLogView(Request $request){
        
        $validator  = Validator::make($request->all(), [
            'postId'  => 'required',
            'userId'  => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            
            $logViewData = [
                'post_id' => $request->postId,
                'user_id' => $request->userId,
            ];
            ActionLog::create($logViewData);
            $data = ActionLog::where('post_id',$request->postId)->count();
            return response()->json([
                'postId' => $request->postId,
                'viewData' => $data
            ]);
        };
    }

    public function views(Request $request){
        $data = ActionLog::where('post_id',$request->id)->count();
        return response()->json([
            'views'=>$data
        ]);
    }
}