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
    <a href="{{route('article.create')}}" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add New</a>
    </div>
    </div>
    </div>
    <div class="QA_table ">

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
    <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
    <td>Category name</td>
    <td>16-23-22</td>
    <td><a href="#" class="status_btn">Delete</a></td>
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
