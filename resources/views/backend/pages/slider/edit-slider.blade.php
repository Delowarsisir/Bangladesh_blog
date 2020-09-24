@extends('backend.master')
@section('title')
    Edit Slider
@stop
@section('page-title')
    Edit Slider
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
                    <form action="{{ route('update-slider') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4"> Add Image </label>
                            <label for="" class="col-md-8">
                                <input type="file" name="slider_image" class="form-control" accept="image/*">
                                <input type="hidden" name="slider_id" class="form-control" value="{{ $slider->id }}">
                                <br/>
                                <img src="{{ asset($slider->slider_image) }}" alt="" width="80" height="60">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Slider Title </label>
                            <label for="" class="col-md-8">
                                <input type="text" name="slider_title" class="form-control" value="{{ $slider->slider_title }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Slider Description </label>
                            <label for="" class="col-md-8">
                                <textarea name="slider_description" class="form-control" rows="5">{{ $slider->slider_description }}</textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Publication Status </label>
                            <div class="col-md-8">
                                <label><input type="radio" name="publication_status" {{ $slider->publication_status == 1 ? 'checked' : ' ' }} value="1"> Published </label>
                                <label><input type="radio" name="publication_status" {{ $slider->publication_status == 0 ? 'checked' : ' ' }} value="0"> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="" class="col-md-8 col-md-offset-4">
                                <input type="submit" name="Slider_btn" class="form-control btn btn-primary" value="Update Slider Info">
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
