<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Contact\Contact;
use App\Models\Post\Post;
use App\Models\Service\Service;
use App\Models\Tag\Tag;

class FrontController extends Controller
{
    private $category;
    private $post;
    private $tag;
    private $contact;
    private $about;
    public function __construct(Category $category, Post $post, Tag $tag, Contact $contact,About $about ){
        $this->category= $category;
        $this->post = $post;
        $this->tag = $tag;
        $this->contact = $contact;
        $this->about = $about;
    }
    public function home(){
        $services = Service::orderBy('id','desc')->get();
        return view('front.pages.home',compact('services'));
    }
    public function about(){
        $about = About::find(1);
        return view('front.pages.about',compact('about'));
    }
    public function service(){
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
    public function contact()
    {
        return view('front.pages.contact');
    }
    public function sendMessage(Request $request){
        try {
            $this->contact->create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
            ]);
            return redirect()->route('home.contact')->with('success', 'Your message has been submitted successfuly!');
        }catch(\Exception $ex){
            return redirect()->route('home.contact')->with('error', $ex->getMessage());
        }
        
    }
    
    


public function like(Request $request)
{
$post_id = $request->post_id;

}
public function Category(){
$categories = Category::orderBy('id','desc')->get();
}
}
