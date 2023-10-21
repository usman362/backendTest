@section('title','Articles')
@extends('layouts.app')
@section('content')

<div class="container-fluid plr_30 body_white_bg pt_30">
    <div class="row justify-content-center">
    <div class="col-12">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h4>Articles</h4>
    <div class="box_right d-flex lms_block">
    <div class="add_button ms-2">
        @can('article-create')
    <a href="{{route('article.create')}}"  class="btn_1">Add New</a>
    @endcan
    </div>
    </div>
    </div>
    <div class="QA_table ">
        @include('includes.messages')
    <table class="table lms_table_active">
    <thead>
    <tr>
    <th></th>
    <th scope="col">title</th>
    <th scope="col">Short Description</th>
    <th scope="col">Date Added</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($articles as $key => $article)

        <tr>
    <td>Category name</td>
    <th scope="row"> <a href="javascript:void(0)" class="question_content"> {{$article->title}}</a></th>
    <td>{{$article->short_description}}</td>
    <td>{{$article->created_at->format('d M Y')}}</td>
    <td><a href="{{route('article.delete',$article->id)}}" class="status_btn">Delete</a></td>
    </tr>

    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection
