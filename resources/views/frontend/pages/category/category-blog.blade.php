@extends('frontend.master')
@section('title')
    Category Blog
@stop
@section('content_title')
    Category List
@stop
@section('body')
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_title }}" class="card-img-top" height="250">
                    <div class="card-body">
                        <h4>{{ $blog->blog_title }}</h4>
                        <p class="card-text">{{ $blog->blog_short_description}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog-details', ['id' => $blog->id]) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
@stop
