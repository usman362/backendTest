<header role="banner">
    <div class="top-bar">
    <div class="container">
    <div class="row">
    <div class="col-9 social">
    <a href="javascript:void(0)"><span class="fa fa-twitter"></span></a>
    <a href="javascript:void(0)"><span class="fa fa-facebook"></span></a>
    <a href="javascript:void(0)"><span class="fa fa-instagram"></span></a>
    <a href="javascript:void(0)"><span class="fa fa-youtube-play"></span></a>
    </div>
    <div class="col-3 social">

        @auth
        <a href="{{ route('article.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> |
        <a href="javascript:void(0)" class="text-sm text-gray-700 dark:text-gray-500 underline logout_btn">Log out</a>
        <form action="{{route('logout')}}" method="post" class="logout_form">@csrf</form>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

    @endauth
    </div>
    </div>
    </div>
    </div>
    <div class="container logo-wrap">
    <div class="row pt-5">
    <div class="col-12 text-center">
    <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
    <h1 class="site-logo"><a href="{{route('home')}}">Backend Test</a></h1>
    </div>
    </div>
    </div>
    </header>
