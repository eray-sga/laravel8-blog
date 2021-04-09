@extends('front.layouts.master')
@section('title',$page->title) 
@section('bg',asset($page->image))
@section('content')
    
<!-- Main Content -->


<div class="col-lg-8 col-md-10 mx-auto">
<p>{!!$page->content!!}</p>
</div>
     
@endsection


