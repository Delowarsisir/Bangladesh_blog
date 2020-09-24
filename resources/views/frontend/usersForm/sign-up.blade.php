@extends('frontend.master')
@section('title')
    Sign Up
@stop
@section('body')
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @if($errors->count() == 1)
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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('new-sign-up') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> First Name</label>
                            <label class="col-md-9"><input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> Last Name</label>
                            <label class="col-md-9"><input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> Email Address</label>
                            <label class="col-md-9"><input type="email" name="email_address" class="form-control" value="{{ old('email_address') }}"></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> Password</label>
                            <label class="col-md-9"><input type="password" name="password" class="form-control"></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> Phone Number</label>
                            <label class="col-md-9"><input type="number" name="phone_number" class="form-control" value="{{ old('phone_number') }}"></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"> Address </label>
                            <label class="col-md-9"><textarea name="address" class="form-control">{{ old('address') }}</textarea></label>
                        </div>
                        <div class="form-group row">
                            <label for="first-name" class="col-md-3"></label>
                            <label class="col-md-9"><input type="submit" name="sign_btn" class="btn btn-success btn-block" value="Register"></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="inpug-group-append">
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
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
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
@stop
