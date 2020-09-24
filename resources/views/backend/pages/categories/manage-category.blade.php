@extends('backend.master')
@section('title')
    Manage Category
@stop
@section('page-title')
    Manage Category
@stop
@section('body')
    <div class="row">
        <div class="col-lg-12">
            @if(session()->has('message'))
                <div class="text-center alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Category Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($i = 1)
                            @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td>{{ $category->publication_status === 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($category->publication_status == 1)
                                    <a href="{{ route('unpublished-category', ['id' => $category->id]) }}" class="btn btn-info btn-sm">
                                        <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                    </a>
                                    @else
                                        <a href="{{ route('published-category', ['id' => $category->id]) }}" class="btn btn-warning btn-sm">
                                            <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                        </a>
                                    @endif
                                    <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-success btn-sm">
                                        <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                    </a>
                                    <a href="{{ route('delete-category', ['id' => $category->id]) }}" class="btn btn-danger btn-sm" onclick="confirm('Are you sure this?')">

                                        <span><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop

