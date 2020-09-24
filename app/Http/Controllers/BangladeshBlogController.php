<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;

class BangladeshBlogController extends Controller
{

    public function index(){
        return view('frontend.home.home', [
            'popularBlogs'  => Blog::orderBy('hit_count', 'desc')->limit('6')->get(),
            'blogs'         => Blog::where('publication_status', 1)->orderBy('id', 'desc')->limit('6')->get(),
            'sliders'       => Slider::where('publication_status', 1)->get()
        ]);
    }

    public function categoryBlog($id){

        return view('frontend.pages.category.category-blog', [

            'blogs'         => Blog::where('category_id', $id)->where('publication_status', 1)->get()

        ]);
    }

    public function detailsBlog($id){

        $blog = Blog::find($id);
        $blog->hit_count = $blog->hit_count + 1;
        $blog->save();

        return view('frontend.pages.blog-details', [
            'blog'          => Blog::find($id),
            'comments'      => DB::table('comments')
                                    ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                    ->select('comments.*', 'visitors.first_name', 'visitors.last_name')
                                    ->orderBy('comments.id', 'desc')
                                    ->get()
        ]);
    }



}
