@extends('back.layouts.master')
@section('title',$page->title.' Sayfasini Güncelle')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
    <form action=" {{route('page.edit.post',$page->id)}} " method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label>Sayfa Başlığı</label>
                <input type="text" name="title" value=" {{$page->title}} " class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sayfa Görseli</label><br>
                <img width="300" height="120" class="img-thumbnail rounded" src="{{asset($page->image)}}" alt="">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Sayfa İçeriği</label>
                <textarea id="editor" name="content" class="form-control">{!!$page->content!!}</textarea>
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sayfayi Güncelle</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#editor').summernote({
      'height':300
  })
});
</script>
@endsection