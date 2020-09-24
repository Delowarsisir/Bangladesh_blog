@extends('backend.master')
@section('title')
    Add Blog
@stop
@section('page-title')
    Add Blog
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
                    <form action="{{ route('new-blog') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                <input type="text" name="blog_title" class="form-control">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Short Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="blog_short_description" class="form-control" rows="5"></textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Long Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="blog_long_description" class="form-control" id="editor"></textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Blog Image </label>
                            <label for="" class="col-md-8">
                                <input type="file" name="blog_image" accept="image/*">
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"> Publication Status </label>
                            <div class="col-md-8">
                                <label><input type="radio" name="publication_status" value="1"> Published </label>
                                <label><input type="radio" name="publication_status" value="0"> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="" class="col-md-8 col-md-offset-4">
                                <input type="submit" name="blog_btn" class="form-control btn btn-primary" value="Save blog Info">
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
