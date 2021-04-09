@extends('back.layouts.master')
@section('title','Silinen Makaleler')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}} makale bulundu </strong> 
    <a href="{{route('makaleler.index')}}" class="btn btn-primary btn-sm">Aktif Makaleler</a>
    </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Oluşturma Tarihi</th>
                        <th style="width:100px;">İşlemler</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td><img src="{{$article->image}}" width="200" height="100" alt=""></td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->Category->name}}</td>
                        <td>{{$article->hit}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('recover',$article->id)}}" title="Silmekten Kurtar" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                            <a href="{{route('harddelete',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection