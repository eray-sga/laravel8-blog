@extends('front.layouts.master')
@section('title',$article->title) 
@section('bg',$article->image)
@section('content')
    
<!-- Main Content -->


        <div class="col-md-9 mx-auto">
         {{$article->content}}<br><br>
        </div>
     
  @include('front.widgets.categoryWidget')
    @endsection
