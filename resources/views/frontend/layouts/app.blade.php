<!doctype html>
<html lang="en">
@include('frontend.includes.header')
<body>
<div class="wrap">

@include('frontend.includes.navbar')

@yield('content')

@include('frontend.includes.footer')

</div>

@include('frontend.includes.library')

</body>


</html>
