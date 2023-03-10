<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentComponent extends Component
{
    public $blog_id;
    public $user_id;
    public $comment_body;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'blog_id' => 'required',
            'user_id' => 'required',
            'comment_body' => 'required',
        ]);
    }

    public function sendComment()
    {
        $this->validate([
            'blog_id' => 'required',
            'user_id' => 'required',
            'comment_body' => 'required',
        ]);

        if (Auth::check()) {
            $comments = new Comment();
            $comments->user_id = $this->Auth::user()->id;
            $comments->blog_id = $this->blog_id;
            $comments->comment_body = $this->comment_body;
            $comments->save();

            session()->flash('message', 'Your Comment has been send successfully!');
        } 
        else 
        {
            redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.comment-component');
    }
}
