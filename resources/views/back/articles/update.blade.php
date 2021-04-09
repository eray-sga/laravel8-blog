@extends('back.layouts.master')
@section('title',$article->title.' Makalesini Güncelle')
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
    <form action="{{route('makaleler.update',$article->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" name="title" value=" {{$article->title}} " class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale Kategori</label>
                <select name="category" class="form-control" required>
                    <option value="">Seçim Yapınız</option>
                    @foreach ($categories as $category)
                        <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Makale Görseli</label><br>
                <img width="300" height="120" class="img-thumbnail rounded" src="{{asset($article->image)}}" alt="">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Makale İçeriği</label>
                <textarea id="editor" name="content" class="form-control">{!!$article->content!!}</textarea>
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
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