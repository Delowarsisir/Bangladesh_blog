<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">{{config('app.name')}}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('category-blog', ['id' => $category->id]) }}">{{ $category->category_name }}</a>
                </li>
                @endforeach
                @if(Session::get('visitorId'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Session::get('visitorName') }}</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="#" onclick="
                                    event.preventDefault();
                                    document.getElementById('visitorLogoutForm').submit();

                                ">Logout</a>
                                <form id="visitorLogoutForm" action="{{ route('visitorLogout') }}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('visitorLogin') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('sign-up') }}">Sign Up</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>
