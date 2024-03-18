<?php

namespace App\Http\Controllers\TrendPost;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrendPostController extends Controller
{
    public function index(){
        $perPage = 3;
        $logs = ActionLog::leftJoin('posts', 'action_logs.post_id', '=', 'posts.post_id')
        ->leftJoin('users', 'action_logs.user_id', '=', 'users.id')
        ->select('action_logs.action_log_id', 'action_logs.post_id', 'action_logs.user_id', 'posts.title', 'users.name as user_name')
        ->selectRaw('COUNT(action_logs.post_id) as post_count')
        ->groupBy('action_logs.post_id')
        ->orderByRaw('COUNT(action_logs.post_id) DESC')
        ->paginate($perPage);
    return view('admin.ActionLog.index', compact('logs'));
    }

    public function detail(Request $request){
        dd('this is trend detail');
    }
}
