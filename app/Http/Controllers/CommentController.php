<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function sendComment(Request $request)
    {
        if (Auth::check()) {

            $comments = new Comment();
            $comments->user_id = Auth::user()->id;
            $comments->comment_body = $request->input('comment_body');
            $comments->blog_id = $request->input('blog_id');

            $comments->save();

            session()->flash('message', 'Your comment has been send successfully!');

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
}
