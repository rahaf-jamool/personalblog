<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Post\Post;
use App\Models\User;
use App\Notifications\AddComment;
use App\Traits\MessageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    use MessageTrait;
    private $comment;
    public function __construct(Comment $comment){
        $this->comment= $comment; 
    }
    public function index(){
        $comments = $this->comment->get();
        return view('admin.comments.index',compact('comments'));
    }
    public function store(Post $post){
        $this->comment->create([
            'comment' => request('comment'),
            'post_id' => $post->id
        ]);
        $user = User::find(Auth::user()->id);
        $comment = $this->comment->latest()->first();
        Notification::send($user, new AddComment($comment));
        return back();
    }
    public function update(Post $post){
        $comment =  $this->comment->update([
            'comment' => request('comment'),
            'post_id' => $post->id
        ]);
        // $notification = Comment::find($comment->id);
            // event(new CommentEvent($notification));
        // $users = Auth::user()->id->get();
        // Notification::send($users, new NewUserComment($comment));
        return back();
    }
    public function markAsReadAll()
    {
        $userUnreadNotification = auth()->user()->unreadNotifications;
        if($userUnreadNotification){
            $userUnreadNotification->markAsRead();
            return back();
        }
    }
    public function destroy($id){
        try{
            $comment = $this->comment->findOrFail($id);
            $comment->delete();
            return $this->SuccessMessage ('comments.index', __('message.deleted'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('comments.index', $ex->getMessage ());
        }
    }
}
