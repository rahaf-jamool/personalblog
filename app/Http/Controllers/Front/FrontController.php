<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Post\Post;
use App\Models\Service\Service;

class FrontController extends Controller
{
    private $category;
    private $post;
    public function __construct(Category $category, Post $post){
        $this->category= $category;
        $this->post = $post;
    }
    public function home(){
        
    }
    public function about(){
        $about = About::find(1);
        $services = Service::orderBy('id','desc')->get();
        return view('front.pages.home',compact('about','services'));
    }
    public function service(){
        $services = Service::orderBy('id','desc')->get();
        return view('front.pages.service',compact('services'));
    }
    public function blog(){
        $posts = $this->post->orderBy('id','desc')->get(); 
        $categories = $this->category->orderBy('id','desc')->get();
        return view('front.pages.blog',compact('posts','categories'));
    }
    public function blogShow($id){
        $post = $this->post->with(['photo','category'])->findOrFail($id);
        // $categories = $this->category->orderBy('id','desc')->get();
        return view('front.pages.single-blog',compact('post'));
    }
    public function like(Request $request)
    {
        $post_id = $request->post_id;
        
    }
    public function Category(){
        $categories = Category::orderBy('id','desc')->get();
    }
}
