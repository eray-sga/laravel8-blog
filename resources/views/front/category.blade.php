@extends('front.layouts.master')
@section('title',$category->name. ' Kategorisi | '. count($articles). ' yazı bulundu') 
@section('content')
    
<!-- Main Content -->

    <div class="col-md-9 mx-auto">
        @if(count($articles)>0)
      @foreach ($articles as $article)    
        <div class="post-preview">
        <a href="{{route('single',$article->slug)}}">
            <h2 class="post-title">
              {{$article->title}}
            </h2>
            <img src="{{asset($article->image)}}" width="650" height="250" alt="">
            <h3 class="post-subtitle">
              {{Str::of($article->content)->limit(50,' [Devamını oku...]')}}
            </h3>
          </a>
          <p class="post-meta">
            <a href="#">Kategori: {{$article->Category->name}}</a>
            <span class="float-right">{{date('d-m-Y', strtotime($article->created_at))}}</span></p>
            <span>Okunma Sayısı: <b>{{$article->hit}}</b></span>
        </div>
        @if (!$loop->last) <!--sonuncu değilse hr koy -->
            <hr>
        @endif
      @endforeach
      {{$articles->links()}}
      @else
      <div class="alert alert-danger">
          <h2>Bu kategoriye ait yazı bulunamadı</h2>
      </div>
      @endif
      
      
      <!-- Pager -->
      
    </div>
    @include('front.widgets.categoryWidget')

    @endsection
