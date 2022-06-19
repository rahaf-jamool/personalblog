<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Post\Post;
use App\Models\Service\Service;
use App\Models\Tag\Tag;

class FrontController extends Controller
{
    private $category;
    private $post;
    private $tag;
    public function __construct(Category $category, Post $post, Tag $tag){
        $this->category= $category;
        $this->post = $post;
        $this->tag = $tag;
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
        $posts = $this->post->orderBy('id','desc')->paginate(10); 
        $categories = $this->category->orderBy('id','desc')->get();
        $tags = $this->tag->get();
        return view('front.pages.blog',compact('posts','categories','tags'));
    }
    public function blogShow($id){
        $post = $this->post->with(['photo','category'])->findOrFail($id);
        // $categories = $this->category->orderBy('id','desc')->get();
        return view('front.pages.single-blog',compact('post'));
    }
    public function search(Request $request){
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $posts = $this->post->where('title', 'like', "%$search%")->paginate(10);
        $posts->appends(['search' => $search]);
        $categories = $this->category->all();
        return view('front.pages.blog', compact('posts', 'search','categories'));
}
public function like(Request $request)
{
$post_id = $request->post_id;

}
public function Category(){
$categories = Category::orderBy('id','desc')->get();
}
}
