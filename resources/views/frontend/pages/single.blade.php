@extends('frontend.layouts.app')
@section('content')

<section class="site-section py-lg">
    <div class="container">
    <div class="row blog-entries element-animate">
    <div class="col-md-12 main-content">
    <img src="{{$article->image_type == 'url' ? $article->image : asset('frontend/images/img_5.jpg')}}" style="width: 100%" alt="Image" class="img-fluid mb-5">
    <div class="post-meta">
    <span class="mr-2">{{$article->created_at->format('M d, Y')}}</span> &bullet;
    </div>
    <h1 class="mb-4">{{$article->title}}</h1>
    <div class="post-content-body">
    {{$article->short_description}}

    </div>

    </div>

    </div>
    </div>
    </section>

@endsection
