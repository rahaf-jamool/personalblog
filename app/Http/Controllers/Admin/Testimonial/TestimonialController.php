<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial\Testimonial;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    use MessageTrait;
    private $testimonial;
    public function __construct(Testimonial $testimonial){
        $this->testimonial= $testimonial; 
    }
    public function index()
    {
        $testimonials = $this->testimonial->orderBy('id','desc')->get();
        return view('admin.testimonials.index',compact ('testimonials'));
    }    
    public function create()
    {
        return view('admin.testimonials.create');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
                ],
                'desc' => [
                    'en' => $request->input('en_desc'),
                    'ar' => $request->input('ar_desc')
                ]
            ];
            $this->testimonial->create($data);            
            DB::commit();
            return $this->SuccessMessage ('testimonials.index', __('message.added'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('testimonials.create', $ex->getMessage ());
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $testimonial = $this->testimonial->findOrFail($id);
        return view ('admin.testimonials.edit',compact('testimonial'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $testimonial = $this->testimonial->findOrFail($id);
            $data = [
                'name' => [
                    'en' => $request->input('en_name'),
                    'ar' => $request->input('ar_name')
                ],
                'desc' => [
                    'en' => $request->input('en_desc'),
                    'ar' => $request->input('ar_desc')
                ]
            ];
            $testimonial->update($data);
            DB::commit();
            return $this->SuccessMessage ('testimonials.index', __('message.updated'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('testimonials.edit', $ex->getMessage ());
        }
    }
    public function destroy($id)
    {
        try{
            $testimonial = $this->testimonial->findOrFail($id);
            $testimonial->delete();
            return $this->SuccessMessage ('testimonials.index', __('message.deleted'));
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('testimonials.index', $ex->getMessage ());
        }
    }
}
