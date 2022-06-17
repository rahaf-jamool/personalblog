<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag\Tag;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    use MessageTrait;
    private $tag;
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }
    public function index()
    {
        $tags = $this->tag->orderBy('id','desc')->get();;
        return view('admin.tags.index',compact('tags'));
    }
    public function create()
    {
        return view('admin.tags.create');
    }
public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slug = $request->en_name;
            $data = [
                'slug' => $slug,
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
                ],
            ];
            $this->tag->create($data);            
            DB::commit();
            return $this->SuccessMessage ('tags.index', ' added');
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
        return view('admin.tags.edit',compact('tag'));
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
            return $this->SuccessMessage ('tags.index', ' updated');
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
            return $this->SuccessMessage ('tags.index', ' deleted');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('tags.index', $ex->getMessage ());
        }
    }
}
