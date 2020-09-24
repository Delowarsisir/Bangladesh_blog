<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{ asset('backend/home') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend/home') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="{{ asset('backend/home') }}/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="{{ asset('backend/home') }}/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="{{ asset('backend/home') }}/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{ asset('backend/home') }}/css/sb-admin.css" rel="stylesheet">

{{--    CK-Editor--}}
    <script src="{{ asset('backend/home/ckeditor') }}/ckeditor.js"></script>
    <script src="{{ asset('backend/home/ckeditor/samples') }}/js/sample.js"></script>

</head>

<body>
