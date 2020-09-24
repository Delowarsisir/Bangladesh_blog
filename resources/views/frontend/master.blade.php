@include('frontend.inc.header')
<!-- Navigation -->
@include('frontend.inc.navigation')
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">@yield('content_title')</h1>

    @yield('body')

</div>
<!-- /.container -->

@include('frontend.inc.footer')
