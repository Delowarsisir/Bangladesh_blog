@extends('backend.master')
@section('title')
    Add Category
@stop
@section('page-title')
    Add Category
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
                    <form action="{{ route('new-category') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4"> Category Name </label>
                            <label for="" class="col-md-8">
                                <input type="text" name="category_name" class="form-control">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Category Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="category_description" class="form-control" rows="5"></textarea>
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
                                <input type="submit" name="category_btn" class="form-control btn btn-primary" value="Save Category Info">
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
