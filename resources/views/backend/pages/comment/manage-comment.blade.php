@extends('backend.master')
@section('title')
    Manage Comment
@stop
@section('page-title')
    Manage Comment
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
                    Manage Comment Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Blog Title</th>
                                <th>visitor Name</th>
                                <th>Comment</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($i = 1)
                            @foreach($comments as $comment)
                                <tr class="odd gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $comment->blog_title }}</td>
                                    <td>{{ $comment->first_name.' '.$comment->last_name }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        @if($comment->publication_status == 1)
                                            <a href="{{ route('unpublished-comment', ['id' => $comment->id]) }}" class="btn btn-info btn-sm">
                                                <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                            </a>
                                        @else
                                            <a href="{{ route('published-comment', ['id' => $comment->id]) }}" class="btn btn-warning btn-sm">
                                                <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                            </a>
                                        @endif

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

