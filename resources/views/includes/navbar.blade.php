<div class="container-fluid g-0">
    <div class="row">
    <div class="col-lg-12 p-0">
    <div class="header_iner d-flex justify-content-end align-items-center">
    <div class="sidebar_icon d-lg-none">
    <i class="ti-menu"></i>
    </div>
    <div class="header_right d-flex justify-content-end align-items-center">
    <div class="profile_info">
    <img src="{{asset('img/client_img.png')}}" alt="#">
    <div class="profile_info_iner">
     <p>Welcome!</p>
    <h5>{{auth()->user()->name}}</h5>
    <div class="profile_info_details">
    <a href="javascript:void(0)" class="logout_btn">Log Out <i class="ti-shift-left"></i></a>
    <form action="{{route('logout')}}" method="post" class="logout_form">@csrf</form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
