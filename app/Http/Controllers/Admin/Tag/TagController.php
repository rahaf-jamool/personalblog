<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Tag\Tag;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    use MessageTrait;
    private $tag;
    private $post;
    public function __construct(Tag $tag, Post $post)
    {
        $this->tag = $tag;
        $this->post = $post;
    }
    public function index()
    {
        $tags = $this->tag->orderBy('id','desc')->get();;
        return view('admin.tags.index',compact('tags'));
    }
    public function create()
    {
        $posts = $this->post->get();
        return view('admin.tags.create',compact('posts'));
    }
public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slug = $request->en_name;
            $data = [
                'slug' => $slug,
                'post_id' => $request['post'],
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
                ],
            ];
            $this->tag->create($data);            
            DB::commit();
            return $this->SuccessMessage ('tags.index', __('message.added'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('tags.create', $ex->getMessage ());
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $tag = $this->tag->findOrFail($id);
        $posts = $this->post->get();
        return view('admin.tags.edit',compact('tag','posts'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $slug = $request->en_name;
            $tag = $this->tag->findOrFail($id);
            $data = [
                'slug' => $slug,
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
                ],
            ];
            $tag->update($data);
            DB::commit();
            return $this->SuccessMessage ('tags.index', __('message.updated'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('tags.edit', $ex->getMessage ());
        }
    }
    public function destroy($id)
    {
        try{
            $tag = $this->tag->findOrFail($id);
            $tag->delete();
            return $this->SuccessMessage ('tags.index', __('message.deleted'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('tags.index', $ex->getMessage ());
        }
    }
}
