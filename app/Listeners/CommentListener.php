<?php

namespace App\Listeners;

use App\Models\Comment\Comment;
use App\Notifications\NewUserComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentListener
{
   public function __construct()
    {
        //
    }

    public function handle($event)
    {
            Auth::user()->id
                ->except($event->comment->id)
                ->each(function(Comment $comment) use ($event){
                    Notification::send($comment, new NewUserComment($event->comment));
            });
    }
}
