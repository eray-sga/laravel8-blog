  @extends('front.layouts.master')
  @section('title','Ana Sayfa') 
  @section('content')
      
  <!-- Main Content -->
  
      <div class="col-md-9 mx-auto">
        @foreach ($articlelist as $article)    
          <div class="post-preview">
          <a href="{{route('single',$article->slug)}}">
              <h2 class="post-title">
                {{$article->title}}
              </h2>
              <img src="{{asset($article->image)}}" style="width:650px;height:250px;" class="img-fluid" alt="">
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
        {{$articlelist->links()}}
        
        
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
      @include('front.widgets.categoryWidget')

      @endsection
