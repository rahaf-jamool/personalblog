<?php

namespace App\Http\Controllers\Front\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Post\Post;
use App\Notifications\NewUserComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function store(Post $post){
        $comment = Comment::create([
            'comment' => request('comment'),
            'post_id' => $post->id
        ]);
        $notification = Comment::find($comment->id);
            event(new CommentEvent($notification));
        // $users = Auth::user()->id->get();
        // Notification::send($users, new NewUserComment($comment));
        return back();
    }
    public function MarkNotification(){
        foreach(auth()->user()->unreadNotifications as $notification){
            $notification->markAsRead();
        }
    }
}
