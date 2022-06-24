<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use MessageTrait;
    private $category;
    public function __construct(Category $category){
        $this->category= $category; 
    }
    public function index()
    {
        $categories = $this->category->orderBy('id','desc')->get();
        return view('admin.categories.index',compact ('categories'));
    }    
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        return $request->all();
        try {
            DB::beginTransaction();
            $slug = $request->en_name;
            $data = [
                'slug' => $slug,
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
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
            $this->category->create($data);            
            DB::commit();
            return $this->SuccessMessage ('categories.index', ' added');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('categories.create', $ex->getMessage ());
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view ('admin.categories.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $slug = $request->en_name;
            $category = $this->category->findOrFail($id);
            $data = [
                'slug' => $slug,
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
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
            $category->update($data);
            DB::commit();
            return $this->SuccessMessage ('categories.index', ' updated');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('categories.edit', $ex->getMessage ());
        }
    }
    public function destroy($id)
    {
        try{
            $category = $this->category->findOrFail($id);
            $category->delete();
            return $this->SuccessMessage ('categories.index', ' deleted');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('categories.index', $ex->getMessage ());
        }
    }
}
