<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
class Category extends Model
{
    protected $fillable = ['category_name', 'category_description', 'publication_status'];

    public static function saveCategoryInfo($request){
        // Validation
        $roles = [

            'category_name' => 'required|unique:categories,category_name|regex:/(^([a-zA-z ]+)(\d+)?$)/u|max:20:|min:3',
            'category_description' => 'required|min:3',
            'publication_status' => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database Insert
        // ORM Fast role code here
//            $category = new Category();
//            $category->category_name        = trim($request->category_name);
//            $category->category_description = trim($request->category_description);
//            $category->publication_status   = $request->publication_status;
//            $category->save();

        // ORM 2nd role code here
//            Category::create([
//
//                'category_name'        => trim($request->input('category_name')),
//                'category_description' => trim($request->input('category_description')),
//                'publication_status'   => $request->input('publication_status'),
//
//            ]);

        DB::table('categories')->insert([


            'category_name'        => trim($request->input('category_name')),
            'category_description' => trim($request->category_description),
            'publication_status'   => $request->input('publication_status'),

        ]);

        session()->flash('type', 'success');
        session()->flash('message', 'Save Category Info Successfully.');

    }

    public static function unpublishedCategoryInfo($id){
        $category = Category::find($id);
        $category->publication_status = 0;

        if($category->publication_status == '0'){
            $blogs = Blog::where('category_id', $category->id)
                ->where('publication_status', 1)->get();

            foreach ($blogs as $blog){
                $blog->publication_status = 0;
                $blog->save();
            }


        }

        $category->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Category Unpublished Successfully.');
    }

    public static function publishedCategoryInfo($id){

        $category = Category::find($id);
        $category->publication_status = 1;
        if ($category->publication_status == '1'){

            $blogs = Blog::where('category_id', $category->id)
                ->where('publication_status', 0)->get();

            foreach ($blogs as $blog){
                $blog->publication_status = 1;
                $blog->save();
            }
        }

        $category->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Category Published Successfully.');
    }

    public static function updteCategoryInfo($request){
        // Validation
        $roles = [

            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database Insert
        // ORM Fast role code here
        $category = Category::find($request->category_id);
        $category->category_name        = trim($request->category_name);
        $category->category_description = trim($request->category_description);
        $category->publication_status   = $request->publication_status;

        $category->save();

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
        session()->flash('message', 'Save Category Info Successfully.');
    }

    public static function deleteCategoryInfo($id){
        $category = Category::find($id);

        $category->delete();

        session()->flash('type', 'success');
        session()->flash('message', 'Delete Category Info Successfully.');
    }






}
