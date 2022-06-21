<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\CommentReplay\CommentReplay;
use App\Traits\MessageTrait;

class CommentReplayController extends Controller
{
    use MessageTrait;
    private $commentReplay;
    public function __construct(CommentReplay $commentReplay){
        $this->commentReplay = $commentReplay; 
    }
    public function store(Comment $comment){
        $comment = $this->commentReplay->create([
            'message' => request('message'),
            'comment_id' => $comment->id
        ]);
        // $notification = Comment::find($comment->id);
            // event(new CommentEvent($notification));
        // $users = Auth::user()->id->get();
        // Notification::send($users, new NewUserComment($comment));
        return back();
    }
}
