<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Photo\Photo;
use App\Models\Post\Post;
use App\Models\Tag\Tag;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use MessageTrait;
    private $post;
    private $category;
    private $tag;
    public function __construct(Post $post , Category $category , Tag $tag)
    {
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
    }
    public function index()
    {
        $posts = $this->post->orderBy('id','desc')->with('photo')->get(); 
        return view('admin.posts.index',compact('posts'));
    }
    public function create()
    {
        $categories = $this->category->get();
        $tags = $this->tag->get();
        return view('admin.posts.create',compact('categories','tags'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction();
            $slug = $request->en_title;
            $data = [
                'slug' => $slug,
                'category_id' => $request['category'],
                'user_id' => Auth::user()->id,
                'date' => $request->input('date'),
                'title' => [
                    'en' => $request->input('en_title'),
                    'ar' => $request->input('ar_title')
                ],
                'short_desc' => [
                    'en' => $request->input('en_short_desc'),
                    'ar' => $request->input('ar_short_desc')
                ],
                'long_desc' => [
                    'en' => $request->input('en_long_desc'),
                    'ar' => $request->input('ar_long_desc')
                ],
            ];
            $post = $this->post->create($data);
            if ($request->has('tags')) {
                $post = $this->post->find($post->id);
                $post->tags()->syncWithoutDetaching($request->get('tags'));
            }
            DB::commit();
            // insert photo main 
            if($request->file('photo')){
                $fileName = $request->file('photo')->getClientOriginalName();
                $post->storeImage($request->file('photo')->storeAs('images/post' , $fileName,'public'),'main');
            }
            // insert photos
            if($request->file('photos')){
                foreach($request->file('photos') as $photo)
                {
                    $fileName = $photo->getClientOriginalName();
                    $post->storeImage($photo->storeAs('images/post/photos/'.$post->name , $fileName,'public'),'gallery');
                }
            }
            // $notification=Post::find($post->id);
            // event(new PostEvent($notification));
            return $this->SuccessMessage ('posts.index', ' added');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('posts.create', $ex->getMessage ());
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $post = $this->post->with(['photo','category'])->findOrFail($id);
        $categories = $this->category->get();
        $tags = $this->tag->get();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $post = $this->post->findOrFail($id);
            $slug = $request->en_title;
            $data = [
                'slug' => $slug,
                'category_id' => $request['category'],
                'user_id' => Auth::user()->id,
                'date' => $request->input('date'),
                'title' => [
                    'en' => $request->input('en_title'),
                    'ar' => $request->input('ar_title')
                ],
                'short_desc' => [
                    'en' => $request->input('en_short_desc'),
                    'ar' => $request->input('ar_short_desc')
                ],
                'long_desc' => [
                    'en' => $request->input('en_long_desc'),
                    'ar' => $request->input('ar_long_desc')
                ],
            ];
            $post->update($data); 
            if ($request->has('tags')) {
                $post = $this->post->find($post->id);
                $post->tags()->syncWithoutDetaching($request->get('tags'));
            }
            DB::commit();
            // insert photo main 
            if($request->file('photo')){
                $fileName = $request->file('photo')->getClientOriginalName();
                $post->updateImage($request->file('photo')->storeAs('images/post' , $fileName,'public'),'main');
            }
            // insert photos
            if($request->file('photos')){
                foreach($request->file('photos') as $photo)
                {
                    $fileName = $photo->getClientOriginalName();
                    $post->storeImage($photo->storeAs('images/post/photos/'.$post->name , $fileName,'public'),'gallery');
                }
            }
            return $this->SuccessMessage ('posts.index', ' added');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('posts.edit', $ex->getMessage ());
        }   
    }
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $this->post->findOrFail($id)->delete;
            DB::commit();
            return $this->SuccessMessage ('posts.index', ' trashed');
        }
        catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage('posts.index', $ex->getMessage());
        }
    }
    public function trash(){
        $post = $this->post->onlyTrashed()->get();
        return view('admin.posts.trash', compact('post'));
    }
    public function restore($id) {
        $post = $this->post->withTrashed()->findOrFail($id);
        if ($post->trashed()) {
            $post->restore();
            return $this->SuccessMessage ('posts.trash', ' restored');
        }else {
            return $this->ErrorMessage ('posts.trash', 'Data is not in restore');
        }
    }
    public function deletePermanent($id){
        $post = $this->post->withTrashed()->findOrFail($id);
        if (!$post->trashed()) {
            return $this->ErrorMessage ('posts.trash', 'Data is not in trash');
        }else {
            $post->tags()->detach();
            $post->photo()->delete();
            $post->photos()->delete();
            $post->forceDelete();
        return redirect()->route('posts.trash')->with('success', 'Data deleted successfully');
        }
    }
    public function showGallery($id)
    {
       $post = $this->post->with('photos')->findOrFail($id);
        return view('admin.posts.gallery', compact('post'));
        // return $post;
    }
    public function deleteGallery(Photo $photo)
    {   
        try{
            $photo->delete();
            return $this->SuccessMessage ('posts.index', ' Gallery deleted ');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('posts.gallery', $ex->getMessage ());
        }
    }
}
