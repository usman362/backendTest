@section('title','Article')
@extends('layouts.app')
@section('content')

<div class="container-fluid plr_30 body_white_bg pt_30">
    <div class="row justify-content-center">
    <div class="col-lg-12">
    <div class="white_box mb_30">
    <div class="box_header ">
    <div class="main-title">
    <h3 class="mb-0">Add Article</h3>
    </div>
    </div>
   @include('includes.messages')
    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
    <label class="form-label" for="Title">Title</label>
    <input type="text" class="form-control" name="title" id="Title" value="{{old('title')}}">
    @error('title')
    <span class="text-danger" >{{$message}}</span>
    @enderror
    </div>
    <div class="mb-3">
    <label class="form-label" for="Picture">Picture</label>
    <input type="file" name="image" class="form-control" id="Picture" >
    @error('image')
    <span class="text-danger" >{{$message}}</span>
    @enderror
    </div>
    <div class="mb-3">
    <label class="form-label" for="ShortDescription">Short Description</label>
    <textarea class="form-control" name="short_description" id="ShortDescription">{{old('short_description')}}</textarea>
    @error('short_description')
    <span class="text-danger" >{{$message}}</span>
    @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
    </div>

    </div>
</div>
@endsection
