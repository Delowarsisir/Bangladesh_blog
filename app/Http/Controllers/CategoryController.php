<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use \Validator;
use DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index(){

        return view('backend.pages.categories.add-category');
    }

    public function saveCategory(Request $request){

        Category::saveCategoryInfo($request);
        // Redirect
        return redirect()->back();

    }


    public function manageCategory(){
        $categories = Category::all();

        return view('backend.pages.categories.manage-category', ['categories' => $categories]);
    }

    public function unpublishedCategory($id){

       Category::unpublishedCategoryInfo($id);
        return redirect()->back();

    }
    public function publishedCategory($id){
            Category::publishedCategoryInfo($id);
            return redirect()->back();

        }

        public function editCategory($id){

            $category = Category::find($id);
            return view('backend.pages.categories.edit-category', ['category' => $category]);

        }

        public function updateCategory(Request $request){
            Category::updteCategoryInfo($request);
            return redirect()->back();

        }

        public function deleteCategory($id){
        Category::deleteCategoryInfo($id);
            return redirect()->back();

        }





}
