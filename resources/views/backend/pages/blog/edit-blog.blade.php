@extends('backend.master')
@section('title')
    Edit Blog
@stop
@section('page-title')
    Edit Blog
@stop
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @if($errors->count() === 1)

                        {{ $errors->first() }}

                    @else
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
            @endif
            <div class="panel-default">
                <div class="panel-body well">
                    <form action="{{ route('update-blog') }}" method="post" class="form-horizontal" enctype="multipart/form-data" name="editBlogForm">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4"> Category Name </label>
                            <label for="" class="col-md-8">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Title </label>
                            <label for="" class="col-md-8">
                                <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $blog->id }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Short Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="blog_short_description" class="form-control" rows="5">{{ $blog->blog_short_description }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Long Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="blog_long_description" class="form-control" id="editor">{{ $blog->blog_long_description }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Image </label>
                            <label for="" class="col-md-8">
                                <input type="file" name="blog_image" accept="image/*">
                                <br>
                                <img src="{{ asset($blog->blog_image) }}" alt="" width="120" height="100">
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"> Publication Status </label>
                            <div class="col-md-8">
                                <label><input type="radio" {{ $blog->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1"> Published </label>
                                <label><input type="radio" {{ $blog->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0"> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="" class="col-md-8 col-md-offset-4">
                                <input type="submit" name="blog_btn" class="form-control btn btn-primary" value="Update blog Info">
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['editBlogForm'].elements['category_id'].value='{{ $blog->category_id }}';
    </script>
@stop
