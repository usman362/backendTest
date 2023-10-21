@extends('frontend.layouts.app')
@section('content')


<section class="site-section py-sm">
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <h2 class="mb-4">Latest Articles</h2>
    </div>
    </div>
    <div class="row blog-entries">
    <div class="col-md-12 main-content">
    <div class="row">
        @foreach ($articles as $key => $article)

    <div class="col-md-6">
    <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
    <img src="{{asset('frontend/images/img_5.jpg')}}" alt="Image placeholder">
    <div class="blog-content-body">
    <div class="post-meta">

    <span class="mr-2">{{$article->created_at->format('M d, Y')}}</span> &bullet;

    </div>
    <h2>{{$article->title}}</h2>
    </div>
    </a>
    </div>

    @endforeach
    </div>
    <div class="row mt-5">
    <div class="col-md-12 text-center">

        {!! $articles->links() !!}

    </div>
    </div>
    </div>


    </div>
    </div>
    </section>

@endsection
