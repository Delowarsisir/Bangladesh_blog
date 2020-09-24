<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
class Blog extends Model
{
    protected $fillable = ['category_id', 'blog_title', 'blog_short_description', 'blog_long_description', 'blog_image', 'publication_status'];

    private function imageUpload($blogImage){
        $imageName  = $blogImage->getClientOriginalName();
        $directory  = 'blog-images/';
        $blogImage->move($directory, $imageName);

        return $directory.$imageName;
    }

    public static function saveBlogInfoFunc($request){
        // Validation
        $roles = [

            'category_id'               => 'required',
            'blog_title'                => 'required|unique:blogs,blog_title',
            'blog_short_description'    => 'required',
            'blog_long_description'     => 'required',
            'blog_image'                => 'required',
            'publication_status'        => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database Insert
        // ORM Fast role code here

        $blog = new Blog();
        $blog->category_id              = trim($request->category_id);
        $blog->blog_title               = trim($request->blog_title);
        $blog->blog_short_description   = trim($request->blog_short_description);
        $blog->blog_long_description    = trim($request->blog_long_description);
        $blog->blog_image               = trim($blog->imageUpload($request->file('blog_image')));
        $blog->publication_status       = $request->publication_status;
        $blog->save();

        // ORM 2nd role code here
//            Category::create([
//
//                'category_name'        => trim($request->input('category_name')),
//                'category_description' => trim($request->input('category_description')),
//                'publication_status'   => $request->input('publication_status'),
//
//            ]);
        // Query builder
//            DB::table('categories')->where('id')->update([
//
//
//                'category_name'        => trim($request->input('category_name')),
//                'category_description' => trim($request->input('category_description')),
//                'publication_status'   => $request->input('publication_status'),
//
//            ]);


        // Redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Save Blog Info Successfully.');
    }

    public static function blogUnpublishedInfo($id){
        $blog = Blog::find($id);
        $blog->publication_status = 0;
        $blog->save();

        session()->flash('type', 'success');
        session()->flash('message', 'Unpublished Blog Info Successfully.');
    }

    public static function blogPublishedInfo($id){
        $blog = Blog::find($id);
        $blog->publication_status = 1;
        $blog->save();

        session()->flash('type', 'success');
        session()->flash('message', 'Published Blog Info Successfully.');
    }

    public static function blogUpdateInfo($request){
        // Validation
        $roles = [

            'category_id'               => 'required',
            'blog_title'                => 'required',
            'blog_short_description'    => 'required',
            'blog_long_description'     => 'required',
            'publication_status'        => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database Insert
        // ORM Fast role code here

        $blog      = Blog::find($request->id);
        $blogImage = $request->file('blog_image');

        if ($blogImage){
            if(file_exists($blog->blog_image)){

                unlink($blog->blog_image);
            }

        }

        $blog->category_id              = trim($request->category_id);
        $blog->blog_title               = trim($request->blog_title);
        $blog->blog_short_description   = trim($request->blog_short_description);
        $blog->blog_long_description    = trim($request->blog_long_description);
        if ($blogImage){
            $blog->blog_image           = $blog->imageUpload($blogImage);
        }
        $blog->publication_status       = $request->publication_status;
        $blog->save();

        // ORM 2nd role code here
//            Category::create([
//
//                'category_name'        => trim($request->input('category_name')),
//                'category_description' => trim($request->input('category_description')),
//                'publication_status'   => $request->input('publication_status'),
//
//            ]);
        // Query builder
//            DB::table('categories')->where('id')->update([
//
//
//                'category_name'        => trim($request->input('category_name')),
//                'category_description' => trim($request->input('category_description')),
//                'publication_status'   => $request->input('publication_status'),
//
//            ]);


        // Redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Update Blog Info Successfully.');
    }

    public static function blogDeleteInfo($id){
        $blog = Blog::find($id);
        $blog->delete();
        // Redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Update Blog Info Successfully.');
    }




}
