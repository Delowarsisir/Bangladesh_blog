@extends('frontend.master')
@include('frontend.inc.slider')
@section('title')
    HOME
@stop
@section('content_title')
    Welcome to Blog
@stop
@section('body')
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_title }}" class="card-img-top" height="250">
                <div class="card-body">
                    <h4>{{ $blog->blog_title }}</h4>
                    <p class="card-text">{{ $blog->blog_short_description }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('blog-details', ['id' => $blog->id]) }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<h1 class="my-4">Popular Blog</h1>

    <div class="row">
        @foreach($popularBlogs as $popularBlog)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($popularBlog->blog_image) }}" alt="{{ $popularBlog->blog_title }}" class="card-img-top" height="250">
                    <div class="card-body">
                        <h4>{{ $popularBlog->blog_title }}</h4>
                        <p class="card-text">{{ $popularBlog->blog_short_description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog-details', ['id' => $popularBlog->id]) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
