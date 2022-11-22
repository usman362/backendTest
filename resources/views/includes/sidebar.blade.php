
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
    <a href="javascript:void(0)"><img src="{{asset('img/Test-Logo.png')}}" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
    <i class="ti-close"></i>
    </div>
    </div>
    <ul id="sidebar_menu">
    <li class="mm-active">
    <a class="has-arrow" href="#" aria-expanded="false">

    <img src="{{asset('img/menu-icon/2.svg')}}" alt="">
    <span>Articles</span>
    </a>
    <ul>
    <li><a class="active" href="{{route('article.index')}}">Articles</a></li>
    <li><a href="{{route('article.create')}}">Add Article</a></li>
    </ul>
    </li>

    </ul>
    </nav>
