<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class CommentController extends Controller
{

    public function manageComment(){

        return view('backend.pages.comment.manage-comment', [

            'comments'      => DB::table('comments')
                                    ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                    ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
                                    ->select('comments.*', 'visitors.first_name', 'visitors.last_name', 'blogs.blog_title')
                                    ->orderBy('comments.id', 'desc')
                                    ->get()


        ]);
    }
    public function unpublishedComment($id){
        $comment = Comment::find($id);
        $comment->publication_status = 0;
        $comment->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Comment Unpublished Successfully.');
        return redirect()->back();

    }
    public function publishedComment($id){
        $comment = Comment::find($id);
        $comment->publication_status = 1;
        $comment->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Comment Published Successfully.');
        return redirect()->back();

    }

    public function index(Request $request){

        $comment = new Comment();

        $comment->visitor_id = $request->visitor_id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();

        session()->flash('type', 'success');
        session()->flash('message', 'Your comment successfully');

        return redirect()->back();

    }



}
