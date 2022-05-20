<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function sendComment(Request $request)
    {
        $request['user_id']=Auth::user()->id;
        if (auth()->check()){
            $request->validate([
                'text'=>'required|string|min:5|max:10000'
            ]);
            Comment::create($request->all());
            alert()->success('نظر ارزشمند شما برای این محصول با موفقیت ثبت شد', 'باتشکر');
            return redirect()->back();
        }else{
            alert()->warning('برای ثبت نطر باید در سایت لاگین کنید','دقت کنید');
            return redirect()->back();
        }
    }
}
