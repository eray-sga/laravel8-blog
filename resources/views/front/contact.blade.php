@extends('front.layouts.master')
@section('title','İletişim') 
@section('bg','https://startbootstrap.github.io/startbootstrap-clean-blog/img/contact-bg.jpg')
@section('content')
    
<!-- Main Content -->

<div class="col-md-8 mx-auto">
    @if(session('success')) <!--Mesaj başarıyla kaydedildiyse-->
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if($errors->any()) <!--form validation kontrolleri-->
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <p>Bizimle iletişime geçebilirsiniz.</p>
    <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
    <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
    <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
    <form action="{{route('contactpost')}}" method="POST">
        @csrf
      <div class="control-group">
        <div class="form-group">
          <label>Ad Soyad</label>
          <input type="text" class="form-control" value=" {{old('name')}} " placeholder="Ad Soyad" name="name" required >
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label>Email Adresi</label>
          <input type="email" class="form-control" value=" {{old('email')}} " placeholder="Email Adresi" name="email" required >
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12">
          <label>Konu</label>
          <select class="form-control" name="topic">
              <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
              <option @if(old('topic')=="Destek") selected @endif>Destek</option>
              <option @if(old('topic')=="Genel") selected @endif>Genel</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label>Mesajınız</label>
          <textarea rows="5" class="form-control" placeholder="Mesajınız" name="message">{{old('message')}}</textarea>
        </div>
      </div>
      <br>
      <div id="success"></div>
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
    </form>
  </div>
     
    @endsection



 