@extends('back.layouts.master')
@section('title','Sayfalar')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><strong>{{$pages->count()}} sayfa bulundu </strong> 
    </h6>
    </div>
    <div class="card-body">
        <div id="orderSuccess" style="display: none;" class="alert alert-success">
            Sıralama başarıyla güncellendi.
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sıralama</th>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Durum</th>
                        <th style="width:100px;">İşlemler</th>
                    </tr>
                </thead>
                
                <tbody id="orders">
                    @foreach ($pages as $page)
                    <tr id="page_{{$page->id}}">
                        <td class="text-center" style="max-width:50px;"><i class="fa fa-arrows-alt-v fa-2x handle" style="cursor: move;"></td>
                        <td><img src="{{asset($page->image)}}" width="200" height="100" alt=""></td>
                        <td>{{$page->title}}</td>
                        <td>
                            <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" @if($page->status==1) checked @endif data-toggle="toggle">
                        </td>
                        <td>
                            <a target="_blank" href="" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href=" {{route('page.edit',$page->id)}} " title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href=" {{route('page.delete',$page->id)}} " title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.13.0/Sortable.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
<script>
    $('#orders').sortable({
        handle:'.handle',
        update:function(){
            var siralama = $('#orders').sortable('serialize');
            $.get("{{route('page.orders')}}?"+siralama,function(data,status){
                $("#orderSuccess").show();
                $("#orderSuccess").show().delay(1000).fadeOut();
            });
        }
    });
</script> 
<script>
    $(function() {
      $('.switch').change(function() {
        id=$(this)[0].getAttribute('page-id');
        statu=$(this).prop('checked');
        $.get("{{route('page.switch')}}", {id:id,statu:statu}, function(data, status){
         console.log(data);
    });
})
      })
  </script>
@endsection