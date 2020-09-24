@extends('frontend.master')
@section('title')
    Blog Details
@stop
@section('body')
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{ $blog->blog_title }}</h1>
    <!-- Comments Form -->
    @if(session()->has('message'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('message') }}
        </div>
    @endif


    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset($blog->blog_image) }}" alt="" width="900" height="300">

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$blog->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Post Content -->
            <p class="lead">{{ $blog->blog_short_description}}</p>

            <p>{!! $blog->blog_long_description !!}</p>

            <hr>
            @if($visitorId = Session::get('visitorId'))
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="{{ route('new-comment') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="visitor_id" value="{{ $visitorId }}">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <input type="hidden" name="blog_id" value="{{ $blog->publication_status }}">
                                <textarea class="form-control" rows="3" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            @foreach($comments as $comment)
                @if($comment->publication_status == 1)
                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">

                        <h5 class="mt-0">{{ $comment->first_name.' '.$comment->last_name }}</h5>
                        <p>{{ $comment->comment }} </p>
                        <span>Comment on {{ $comment->created_at }}</span>

                    </div>
                </div>
                    @endif
                @endforeach

            @else
                <div class="card my-4">

                    <div class="card-body">
                        <h5 class="card-header">You have to login comments this blog. If you are register then <a href="{{ route('visitorLogin') }}">Login</a> or <a href="{{ route('sign-up') }}">Sign UP</a></h5>
                    </div>
                </div>
        @endif

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                <li>
                                    <a href="#">{{ $category->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
@stop
