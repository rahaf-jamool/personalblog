<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Traits\MessageTrait;
use Illuminate\Support\Facades\DB;

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
    public function destroy($id){
        try{
            $comment = $this->comment->findOrFail($id);
            $comment->delete();
            return $this->SuccessMessage ('comments.index', ' deleted');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('comments.index', $ex->getMessage ());
        }
    }
}
