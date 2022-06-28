<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Traits\MessageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use MessageTrait;
    private $about;
    public function __construct(About $about)
    {
        $this->about = $about;   
    }
    public function about()
    {
        $about = $this->about->with('photo')->find(1);
        return view ('admin.about',compact('about'));
    }
    public function aboutUpdate(Request $request)
    {
        // return $request->all();
        try{       
            DB::beginTransaction();
            $about = $this->about->findOrFail(1);
            $data = [
                'gmail' =>  $request->input('gmail'),
                'address' =>  $request->input('address'),                
                'phone' =>  $request->input('phone'),
                'twitter' =>  $request->input('twitter'),
                'facebook' =>  $request->input('facebook'),
                'instegram' =>  $request->input('instegram'),                
                'youtube' =>  $request->input('youtube'),
                'job' =>  $request->input('job'),
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
            $about->update($data);
            // upadate photo main 
            if($request->file('photo')){
                $fileName = $request->file('photo')->getClientOriginalName();
                $about->updateImage($request->file('photo')->storeAs('images/about' , $fileName,'public'),'main');
            }
            DB::commit();
            return $this->SuccessMessage ('admin.about', ' updated');
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->ErrorMessage ('admin.about', $ex->getMessage ());
        }
    }
}
