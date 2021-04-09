<div class="col-md-3">
    <div class="card">
      <div class="card-header">
        Kategoriler
      </div>
      <div class="list-group">
        @foreach ($categorylist as $category)
        <!-- urlde 2.segment yani kategori adresi eşit ise kategori linkine active ekle -->
          <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
          <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif  >{{$category->name}} <span class="badge bg-primary text-white float-right">{{$category->articleCount()}}</span></a>
          </li>
        @endforeach
      </div>
    </div>
    
  </div>