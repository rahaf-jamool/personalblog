<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($locale){
        try{
            if (array_key_exists($locale,config('locale.languages'))){
                Session::put('locale', $locale);
                App::setLocale($locale);
                return redirect()->back();
            }
            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back();
        }
    }
}
