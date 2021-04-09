@extends('back.layouts.master')
@section('title','Ayarlar')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
           <form action=" {{route('config.update')}} " method="POST" enctype="multipart/form-data">
            @csrf
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Site Başlığı</label>
                           <input name="title" required type="text" class="form-control" value=" {{$config->title}} ">
                       </div> 
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Aktiflik Durumu</label>
                        <select name="active" class="form-control">
                            <option @if($config->active==1) selected @endif value="1">Açık</option>
                            <option @if($config->active==0) selected @endif value="0">Kapalı</option>
                        </select>
                    </div> 
                </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Logo</label>
                        <input type="file" name="logo" class="form-control" >
                    </div> 
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                     <label>Site Favicon</label>
                     <input type="file" name="favicon" class="form-control" >
                 </div> 
             </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" value=" {{$config->facebook}} " class="form-control" >
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" value=" {{$config->twitter}} " class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>GitHub</label>
                        <input type="text" name="github" value=" {{$config->github}} " class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>LinkedIn</label>
                        <input type="text" name="linkedin" value=" {{$config->linkedin}} " class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>YouTube</label>
                        <input type="text" name="youtube" value=" {{$config->youtube}} " class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" value=" {{$config->instagram}} " class="form-control" >
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <button class="form-control btn btn-md btn-block btn-success" type="submit">GÜNCELLE</button>
            </div>
           </form>
    </div>
</div>
@endsection
