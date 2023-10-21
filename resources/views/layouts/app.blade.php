
<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<body class="crm_body_bg">


@include('includes.sidebar')


<section class="main_content dashboard_part">

@include('includes.navbar')

<div class="main_content_iner ">

    @yield('content')

</div>

@include('includes.footer')

</section>

@include('includes.library')

</body>
</html>
