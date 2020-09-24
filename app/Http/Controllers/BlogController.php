<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function addBlogInfo(){

        return view('backend.pages.blog.add-blog', [

            'categories' => Category::where('publication_status', 1)->get()
        ]);

    }

    public function saveBlogInfo(Request $request){
        $blog = new Blog();
        $blog->saveBlogInfoFunc($request);
        return redirect()->back();
    }


    public function manageBlog(){

       $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('backend.pages.blog.manage-blog', [

            'blogs' => $blogs
        ]);

        }

    public function blogUnpublished($id){

        Blog::blogUnpublishedInfo($id);
        return redirect()->back();
    }

    public function blogPublished($id){

            Blog::blogPublishedInfo($id);
            return redirect()->back();
        }

        public function blogEdit($id){


            return view('backend.pages.blog.edit-blog', [

                'categories' => Category::where('publication_status', 1)->get(),
                'blog' => Blog::find($id)

            ]);

        }

        public function blogUpdate(Request $request){
            $blog = new Blog();
            $blog->blogUpdateInfo($request);
            return redirect()->back();


        }

    public function blogDelete($id){

        Blog::blogDeleteInfo($id);
        return redirect()->back();

    }




    }


