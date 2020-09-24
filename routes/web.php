<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 404 & 405 route section

Route::get('/404', [

    'uses' => 'ErrorHandleController@error404',
    'as'    => '/404'

]);

Route::get('/405', [

    'uses' => 'ErrorHandleController@error405',
    'as'    => '/405'

]);


///*Route::get('/', function () {
//    return view('welcome');
//});*/
//Start frontend code here
Route::get('/', [

    'uses' => 'BangladeshBlogController@index',
    'as'    => '/'

]);

Route::get('/category/blog/{id}', [

    'uses' => 'BangladeshBlogController@categoryBlog',
    'as'    => 'category-blog'

]);

Route::get('/blog/details/{id}', [

    'uses'  => 'BangladeshBlogController@detailsBlog',
    'as'    => 'blog-details'


]);

// Start frontend users registration form

Route::get('/user/signup', [

    'uses'  => 'SignUpController@index',
    'as'    => 'sign-up'

]);

Route::post('/new/sign-up', [

    'uses'  => 'SignUpController@newSignUp',
    'as'    => 'new-sign-up'

]);

Route::post('/user/logout', [

    'uses'  => 'SignUpController@visitorLogout',
    'as'    => 'visitorLogout'

]);

Route::get('/user/login', [

    'uses'  => 'SignUpController@visitorLogin',
    'as'    => 'visitorLogin'

]);

Route::post('/visitor/sign-in', [

    'uses'  => 'SignUpController@visitorSignIn',
    'as'    => 'visitor-sign-in'

]);



// End frontend users registration form

// Comments section

Route::get('/comment/manage', [

    'uses'  => 'CommentController@manageComment',
    'as'    => 'manage-comments'


]);

Route::get('/comment/unpublished/{id}', [

    'uses'  => 'CommentController@unpublishedComment',
    'as'    => 'unpublished-comment'
]);

Route::get('/comment/published/{id}', [

    'uses'  => 'CommentController@publishedComment',
    'as'    => 'published-comment'
]);



Route::post('/new/comment', [
    'uses'  => 'CommentController@index',
    'as'    => 'new-comment'

]);



// End frontend code here
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

// Start Middleware Section
Route::group(['middleware' => ['supperAdminMiddleware']], function (){


    /* Start Category Info */

    Route::get('/category/add',[

        'uses' => 'CategoryController@index',
        'as'   => 'add-category'


    ]);

    Route::post('/category/save',[

        'uses' => 'CategoryController@saveCategory',
        'as'   => 'new-category'


    ]);

    Route::get('/category/manage', [

        'uses'  => 'CategoryController@manageCategory',
        'as'    => 'manage-category'

    ]);

    Route::get('/category/unpublished/{id}', [

        'uses'  => 'CategoryController@unpublishedCategory',
        'as'    => 'unpublished-category'
    ]);

    Route::get('/category/published/{id}', [

        'uses'  => 'CategoryController@publishedCategory',
        'as'    => 'published-category'
    ]);

    Route::get('/category/edit/{id}', [

        'uses'  => 'CategoryController@editCategory',
        'as'    => 'edit-category'

    ]);

    Route::post('/category/update', [

        'uses'  => 'CategoryController@updateCategory',
        'as'    => 'update-category'

    ]);

    Route::get('/category/delete/{id}', [

        'uses'  => 'CategoryController@deleteCategory',
        'as'    => 'delete-category'

    ]);


    /* End Category Info */


    /* Start Blog Info */

    Route::get('/blog/add', [

        'uses'  =>  'BlogController@addBlogInfo',
        'as'    =>  'add-blog'

    ]);

    Route::post('/blog/save', [

        'uses'  =>  'BlogController@saveBlogInfo',
        'as'    =>  'new-blog'

    ]);



    Route::get('/blog/manage', [

        'uses'  =>  'BlogController@manageBlog',
        'as'    =>  'manage-blog'

    ]);

    Route::get('/blog/unpublished/{id}', [

        'uses'  => 'BlogController@blogUnpublished',
        'as'    => 'unpublished-blog'


    ]);

    Route::get('/blog/Published/{id}', [

        'uses'  => 'BlogController@blogPublished',
        'as'    => 'published-blog'


    ]);



    Route::get('/blog/edit/{id}', [

        'uses'  => 'BlogController@blogEdit',
        'as'    =>  'edit-blog'

    ]);

    Route::post('/blog/update', [

        'uses'  => 'BlogController@blogUpdate',
        'as'    =>  'update-blog'

    ]);


    Route::get('/blog/delete/{id}', [

        'uses'  => 'BlogController@blogDelete',
        'as'    =>  'delete-blog'

    ]);

    /* End Blog Info */

    /* Start Blog slider Info */

    Route::get('/add/slider', [

        'uses'  => 'SliderController@addSliderInfo',
        'as'    => 'add-slider'


    ]);

    Route::post('/new/slider', [

        'uses'  => 'SliderController@saveSliderInfo',
        'as'    => 'new-slider'


    ]);


Route::get('/manage/slider', [

        'uses'  => 'SliderController@manageSliderInfo',
        'as'    => 'manage-slider'


    ]);

Route::get('/unpublished/slider/{id}', [

        'uses'  => 'SliderController@unpublishedSliderInfo',
        'as'    => 'unpublished-slider'


    ]);

Route::get('/published/slider/{id}', [

        'uses'  => 'SliderController@publishedSliderInfo',
        'as'    => 'published-slider'


    ]);

Route::get('/edit/slider/{id}', [

        'uses'  => 'SliderController@editSliderInfo',
        'as'    => 'edit-slider'


    ]);



Route::post('/update/slider', [

        'uses'  => 'SliderController@updateSliderInfo',
        'as'    => 'update-slider'


    ]);

Route::get('/delete/slider/{id}', [

    'uses'  => 'SliderController@deleteSliderInfo',
    'as'    => 'delete-slider'

]);


    /* Start Blog slider Info */


});

// End Middleware Section
