<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Himpunan Mahasiswa Teknik Informatika</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Himpunan Mahasiswa Tehnik Informatika Universitas Nusa Putra Sukabumi">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="{{asset('assets/img/hmti/logo.png')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">


  {!! Html::style('assets/plugins/bootstrap/dist/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/bootstrap-notifications.min.css') !!}
  {!! Html::style('assets/materialize/css/materialize.min.css') !!}
  {!! Html::style('assets/css/sweetalert.css') !!}
  {!! Html::style('assets/css/animate.min.css') !!}
  {!! Html::style('assets/css/styles.css') !!}
  {!! Html::style('assets/css/bokura-style.css') !!}
  {!! Html::style('assets/css/component.css') !!}
  <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css" media="screen" property="" />
  <link rel="stylesheet" href="{{asset('assets/css/hover-min.css')}}" type="text/css" media="screen" property="" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}">
  {!! Html::style('assets/materialize/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/css/font-awesome.min.css') !!}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jcrop/css/jquery.Jcrop.min.css') }}">
   
   <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>

<style type="text/css">
h1, h2, h3{
  font-size: 35px;
}
nav .logo-page {
 position: absolute;
 margin: 20 50px;
  background: url('assets/img/hmti/logo-transparan.png');
  background-size: cover;
}
#toast-container {
  top: auto !important;
  right: auto !important;
  bottom: 10%;
  left:7%;
}
/*hoe,blade*/
.transparants {
  position: relative;
  background-color: transparent;
  box-shadow: none;
}
.transparants .brand-logo {
  color: gray;
  font-size: 25px;
}
.transparants .brand-logo img {
  width: 60px;
}
.transparants a{
  font-style: 15px;
  font-weight: 500;
  color: gray;
}
.transparants a:hover {
  color: #42A5F5;
  border-bottom: 4px solid #42A5F5;
}
.transparants .active a {
  color: #42A5F5;
  height: 60px;
  border-bottom: 4px solid #42A5F5;
  font-weight: 600;
}

.slides .description {
  position: absolute;
  margin-left: 0;
  background: linear-gradient(to bottom right,#1E88E5,#0D47A1);
  top: 80%;
  width: auto;
  border-radius: 5px 0 0 17px;
  box-shadow: 0 7px 10px rgba(0, 0, 0, 0.2);
  opacity: .9;
 }
.slides .description .headers {
  margin: 5px 20px -6px;
  font-size: 30px;
  font-weight: 600;
}

.flex-direction-nav a {
    display: block;
    width: 50px;
    height: 50px;
    margin: -20px 0 0;
    position: absolute;
    top: 50%;
    z-index: 10;
    overflow: hidden;
    opacity: 0;
    cursor: pointer;
    color: rgba(0, 0, 0, 0.8);
    text-shadow: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    color: #fff;
    background-color: transparent;
    border-radius: 50%;
    border: solid 2px #1E88E5;
    text-align: center;
}
.flex-direction-nav a:before {
    font-family: "flexslider-icon";
    font-size: 30px;
    display: inline-block;
    content: '\f001';
    color: #1E88E5;
    text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.3);
    line-height: 50px;
}
.flex-direction-nav .flex-next {
    font-family: "flexslider-icon";
    font-size: 30px;
    display: inline-block;
    content: '\f001';
    color: #1E88E5;
    text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.3);
    line-height: 50px;
    text-align: center;
}
.panel-bokura {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

::-webkit-scrollbar {
    width: 11px;
}
 
::-webkit-scrollbar-track { 
    background-color: #F5F5F5;
}
 
::-webkit-scrollbar-thumb {
   border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.1);
  background-color: #eee;
}

@media (min-width: 320px) {
.white a {
  margin-top: 7px;
}
.white .brand-logo {
  margin-left: -2.5em;
}
.white .brand-logo img {
  width: 70px;
  margin-top: 15px;
}
.white .hito {
  margin-top: 0;
}
.logo-page img{
  height: 50px;
  width: 50px;
}
.grid {
  margin-left: -18px;
}
.grid li {
  width: 99%;
  font-size: 7px;
}
.grid .user-pic {
  width: 100%;
}
.grid .user-pic img {
  margin-top: -10px;
  width: 35px;
  height: auto;
}
.grid .user-pic span {
  margin: 0 3.5em;
  font-size: 15px;
}
 
.paging-cust {
  width: 100%;
  text-align: center;
}
.popular-header {
  margin-left: 0;
  width: 90%;
}
.grid-item .collection .btn-floating i{
  margin-top: 0;
}

.bg-cover .item-head img {
  margin: 2em 0;
}
.bg-cover .title-header h3 {
  margin: 2em 5px;
  width: 100%; 
  font-size: 1.5em;
  line-height: 1.5em;
}
.bg-cover .title-header h3 span {
  font-size: 16px;
  font-weight: 500;
}
.body-post .artikels {
  margin-top: -12em;
}
#mobile-demo.side-nav {
  z-index: 10000;
}
#mobile-demo.side-nav {
  margin-top: -30px;
}
#profile-side.side-nav {
  margin-top: -30px;
}
#profile-side .cover-side {
  margin-top: 30px;
  width: 100%;
  height: auto;
}
#profile-side .user-side {
  position: absolute;
  margin: -3em 20px;
  width: 60px;
  height: auto;
}
#profile-side .user-detail {
  margin: 25px;
  line-height: 25px;
}
}
@media (min-width: 412px) {
.white a {
  margin-top: 0;
}
.white .brand-logo {
  margin-left: -3em;
}
.white .brand-logo img {
  margin-top: 0;
}
  .grid {
   margin-left: -17px;
  }
 .grid li {
  width: 400px;
  font-size: 7px;
 }
 }
@media (min-width: 450px) {
  #wrapper {
        padding-left: 0;
    }
  .white .brand-logo {
    margin-left: -6em;
  }
 .grid {
      margin-left: 2em;
    }
 .grid li {
  width: 45%;
  font-size: 7px;
 }
 .grid .user-pic .title {
  width: 100%;
 }
 .grid .user-pic img {
  width: 20px;
  height: auto;
 }
 .grid .user-pic .title span {
  margin: 5px 25px;
  font-size: 12px;
 }
  #page-content-wrapper {
  margin: 7em -6.3em;
 }
  #wrapper.toggled #page-content-wrapper {
  z-index: 1;
 }
 .right-card {
  position: absolute;  
  margin: 100%-16em;
  margin-bottom: 0;
  width: 300px;
  height: 100%;
}
}
@media (min-width: 640px) {
  .grid li {
  width: 270px;
  font-size: 7px;
 }
 .grid .user-pic img {
  margin-top: 1px;
 }
 .grid .user-pic span {
  margin: 0 2em;
  width: 200px;
 }
}
@media (min-width: 730px) {
.white .brand-logo {
  margin-left: 0;
}
   #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 10px;
        margin: 5em 7em;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

.grid {
   margin-left: 0;
  }
 .grid li {
  width: 100%;
  font-size: 7px;
 }

.paging-cust {
  margin: 0 4em 50px;
  width: 100%;
}

}

@media (min-width: 992px) {
.white .lefts {
 margin-left: 15em; 
}
.white .right {
  margin-top: -4.3em;
}
.search-nav {
  margin-left: 1em;
  width: 320px;
}
.grid {
      margin-left: 4em;
    }
 .grid li {
  width: 46%;
  font-size: 7px;
 }
#page-content-wrapper {
  margin: 6.5em 4em;
 }
}
@media (min-width: 1024px) {
  .white .brand-logo {
    margin-left: 1em;
  }
  .white .lefts {
    margin-left: 9.5em; 
  }
  .white .right {
    margin-top: 0;
  }
}
@media (min-width: 1200px) {
.white a {
  margin-top: 0;
}
.white .brand-logo {
  margin-left: 2em;
}
.white .brand-logo img {
  margin-top: 0;
}
.white .hito {
  margin-top: 0;
}
.white .lefts {
 margin-left: 14em; 
}
.white .right {
  margin-top: 0;
}
.search-nav {
  margin-left: 3em;
  width: 450px;
}
.grid {
  margin: 30px 6em;
  max-width: 87em;
}
 .grid li {
  margin-bottom: 15px;
  width: 380px;
 }
 .grid .user-pic {
  height: 20px;
 }
 .grid .user-pic img {
  margin-top: -5px;
 }
 .grid .user-pic span {
  position: absolute;
  width: 300px;
  margin-left: 3em;
  font-style: 14px;
 }
 .grid .user-pic img{
   position: absolute;
   width: 30px;
   height: auto;
}
.grid-item .collection .btn-floating i{
  margin-top: 0;
}
.sides-card {
  margin-top: -2em;
  margin-left: 23em;
}
.sides-card .recomend-card {
  margin: -2em 0 4em ;
}
#page-content-wrapper {
  display: show;
  margin: 6.5em -10px;
 }
.popular-header {
  margin: 0 24em 0;
  width: 74%;
}
.bg-cover .item-head img {
  margin: 7em 10px;
}
.bg-cover .title-header {
  position: relative;
  height: 400px;
  font-weight: 900;
  border-radius: 5px 0 20px 5px;

}
.bg-cover .title-header h3 {
  margin: 3.5em 0;
  width: 700px; 
  font-size: 2.5em;
  line-height: 1.5em;
}
.bg-cover .title-header h3 span {
  font-size: 16px;
  font-weight: 500;
}
.body-post .artikels {
  margin-top: 2em;
}

}

   .input-field .prefix.active {
     color: #1e88e5;
   }
   .input-field input:focus + label {
      color: #1e88e5 !important;
    }
   .row .input-field input:focus {
      border-bottom: 1px solid #1e88e5 !important;
      box-shadow: 0 1px 0 0 #1e88e5 !important
    }  

#myFooter {
    color: #000;
    z-index: 1000;
    height: 80px;
}

#myFooter .footer-copyright {
    background-color: #fff;
    padding: 3px;
    color: #000;
    height: 85px;
}

#myFooter .footer-copyright p {
    margin: 30px;
    color: #000;
    font-size: 16px;
}
#myFooter .footer-copyright a {
  color: #000;
}

#myFooter a:hover,
#myFooter a:focus {
    text-decoration: none;
    color: #000;
}

#myFooter .social-foot {
    text-align: right;
    margin-top: -4.5em;
    margin-right: 30px;
}

#myFooter .social-foot a {
    margin-right: 10px;
    font-size: 32px;
    color: #e0e0e0;
    padding: 2px;
    transition: 0.2s;
}

#myFooter .social-foot a:hover {
    text-decoration: none;
}

#myFooter .facebook:hover {
    color: #0077e2;
}

#myFooter .google:hover {
    color: #ef1a1a;
}

#myFooter .twitter:hover {
    color: #00aced;
}
#myFooter .youtube:hover {
    color: #d32f2f;
}

@media screen and (max-width: 767px) {
    #myFooter {
        text-align: center;
    }
}

#myFooter{
   flex: 0 0 auto;
   -webkit-flex: 0 0 auto;
}
/*shows.blad*/
.red .darken-2 a:hover{
  color: #fff;
}
.conten-bokura {
  margin-left: -7px;
}
/*login.blade*/
input::-ms-clear, input::-ms-reveal {
display: none;
  }
  #login-page {
    padding: 70px;
    background: url('assets/img/hmti/background-transparan.png') no-repeat;
  }
  .login-form{
  margin: 0 60%;
  width:350px;
  height: 440px;
} 
.login-form .icon {
  width: 48px;
  height: 55px;
  margin: 0;
}
.login-form .btn-log{
  margin-top: 20px;
}
.login-form .log-head{
  margin: 0 0 4% 0;
  text-align:center;
  font-size: 24px;
}
/*register.blade*/
#register-page {
  padding: 70px;
  background: url('assets/img/hmti/background-transparan.png');
  background-size: cover;
  height: 100vh;
}
.register-form{
  margin: 0 0 8em;
  width:350px;
  height: 500px;
  opacity: .9;
}
.register-form .log-head{
  margin: 0;
  text-align:center;
  font-size: 24px;
}
.register-form .icon {
  width: 48px;
  height: 55px;
  margin: 0;
}
/*404.blade*/
.error-page
{
  margin: 10% 0 13%;
  width: 100%;
}
.error-page .headline
{
  font-size: 90px;
  color: #d32f2f;
}
.error-page img {
  width: 250px;
}
.headline span {
  font-size: 25px;
}

.empty-post {
  height: 475px;
}
.event {
  margin-top: -20px;
}
.event-header {
  margin-bottom: 20px;
  background-color: #66bb6a;
  min-width: 100%;
  height: 200px;
}
.event-header h3 {
  padding: 30px;
  margin-left: 25px;
  font-weight: 800;
}
.event .event-poster {
  width: 100%;
}
.event .event-empty {
  margin-top: 8px;
  height: 284.43px;
}
div#events .fc-left h2 {
  margin-top: 5px;
  font-size: 20px;
  color: #1565c0;
}

.forums {
  margin-top: -20px;
}
.forums-header {
  margin-bottom: 20px;
  background: #e53935;
  min-width: 100%;
  height: 180px;
}
.forums-header h3 {
  padding: 40px;
  font-weight: 700;
  color: #fff;
}
.forums-header h3 .btn-large {
  margin-top: 10px;
  background: transparent;
  color: #fff;
  border-radius: 26px;
  border: 2px solid #fff;
  font-size: 17px;
}
.forums-panel {
  margin-left: -15px;
}
.forums-list {
  width: 100%;
  background-color: #fff;
}
.forums-content {
  padding: 30px;
  margin: 0 20px;
  border-bottom: 1px solid #eee;
}
.forums-content .forums-avatar > img {
  position: absolute;
  margin: 20px 20px;
  height: 40px;
  width: auto;
}
.forums-content .forums-title {
  margin-left: 5em;
  font-size: 18px;
  font-weight: 600;
}
.forums-content .forums-title a {
  margin-left: 5em;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  line-height: 16px;     /* fallback */
  max-height: 32px;      /* fallback */
  -webkit-line-clamp: 1; /* number of lines to show */
  -webkit-box-orient: vertical;
}
.forums-content .forums-title a:hover {
  text-decoration: underline;
}
.forums-content .forums-title p {
  margin-top: 1px;
  margin-left: 6.5em;
  color: red;
  font-size: 14px;
  font-weight: 500;
}
.forums-content .right {
  margin-top: 2em;
}
.forums-content p {
  margin: -7.5px 6.5em;
  width: 75%;
}
.forums-right-side {
  background-color: #fff;
  border-top: 40px solid #e53935;
}
.forums-right-side .header {
  position: absolute;
  margin: -30px 20px;
  color: #fff;
  font-size: 18px;
  font-weight: 600;
}
.forums-right-side .channel-list {
  padding: 20px;
  font-size: 18px;
}
.forums-right-side .channel-list li {
  width: 280px;
  height: 45px;
  line-height: 45px;
}
.forums-right-side .channel-list li > a {
  position: absolute;
  margin-left: 5px;
  width: 280px;
  color: #000;
}
.forums-show-head {
  margin-top: -20px;
  background-color: #e53935;
  height: 200px;
}
.forums-show-head h3 {
  padding-top: 60px;
  font-size: 44px;
  font-weight: 700;
}
.forums-show {
  margin-top: 10px;
  background-color: #fff;
  border-bottom: 2px solid #eee;
}
.forums-show .avatar {
  padding: 30px;
}
.forums-show .avatar img {
  width: 50px;
  height: 50px;
}
.forums-show .content {
  margin: -2.1em 8em 20px;
}
.forums-show .title {
  font-size: 20px;
  font-weight: 600;
}
.forums-show .title p {
  font-size: 15px;
  font-weight: 500;
  color: red;
}
.forums-show .body {
  margin-top: 30px;
  font-size: 16px;
  line-height: 20px;
}
.forums-post {
  margin-top: 20px;
  background: #fff;
  border-top: 30px solid #e53935;
}
.forums-post .header {
  position: absolute;
  margin: -27px 5px;
  color: #fff;
  font-size: 16px;
  font-weight: 600;
}
.answer {
  margin-bottom: 50px;
  background-color: #fff;
}
.answer .answer-avatar {
  padding: 30px;
  margin-left: 20px;
}
.answer .answer-avatar img {
  width: 40px;
  height: 40px;
}
.answer .answer-content {
  margin: -4.3em 8em 10px;
}
.answer .answer-content .title {
  font-size: 16px;
  font-weight: 600;
}
.answer-empty {
  height: 700px;
}
.answer .answer-content .title span {
  font-size: 15px;
  font-weight: 500;
}
.answer .answer-content .body {
  margin-top: 30px;
  font-size: 16px;
  line-height: 20px;
}
.user-pic {
    margin: 15px 5px 23px;
}
.user-pic img{
   position: absolute;
   margin: -5px 3px;
   width: 25px;
   height: auto;
}
.user-pic span {
    margin: 2em 2.7em;
    font-size: 14px;
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    line-height: 17px;     /* fallback */
    max-height: 32px;      /* fallback */
    -webkit-line-clamp: 1; /* number of lines to show */
    -webkit-box-orient: vertical;
}
.nav-soc {
  position: absolute;
  max-width: 5%;
}
.user-navbar a img {
  margin-top: -10px;
}
.user-navbar .image-user {
  float: left;
  width: 35px;
  height: 35px;
  border-radius: 50%;
  margin-right: 10px;
  margin-top: 10px;
}

.ajax-loading {
  text-align: center;
}
</style>
</head>
<body class="bokurasei">
  <div id="app">
      <header>
       @include('template.headers')
       @include('template.sidebar')
       @auth
        @include('template.profilesidebar')
       @endauth
      </header>
      <main class="bokurasei-content" style="min-height: 100vh;">

      @yield('content')
      </main>
  </div>
  
  @include('template.footers')
 
  <script src="{{ asset('js/app.js') }}"></script>
  {!! Html::script('assets/js/jquery.form.min.js') !!}
  {!! Html::script('assets/plugins/jQueryUi/jquery-ui.js') !!}
  {!! Html::script('assets/js/bootstrap.min.js') !!}
  {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}
  <script type="text/javascript" src="{{ asset('assets/materialize/js/bin/materialize.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
  <script type="text/javascript" src="{{asset('assets/js/typeahead/typeahead.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/croppie/croppie.min.js')}}"></script>
  {!! Html::script('assets/plugins/fullcalendar/lib/moment.min.js') !!}
  {!! Html::script('assets/plugins/fullcalendar/fullcalendar.js') !!}
  {!! Html::script('assets/js/jquery.flexslider.js') !!}
  {!! Html::script('assets/js/jquery.sticky.js') !!}
  {!! Html::script('assets/js/sweetalert.min.js') !!}
  {!! Html::script('assets/js/bootstrap-show-password.js') !!}
  {!! Html::script('assets/editor/ckeditor/ckeditor.js') !!}
  {!! Html::script('assets/editor/ckeditor/config.js') !!}
  <script src="{{asset('assets/editor/tinymce/tinymce.min.js')}}"></script>
  {!! Html::script('assets/js/sheisun.js') !!}
  
  <script type="text/javascript" src="{{ asset('assets/js/masonry/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.js') }}"></script>
  <script src="{{ asset('assets/js/classie.js') }}"></script>
  <script src="{{ asset('assets/js/AnimOnScroll.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
  @include('sweet::alert')
  @include('template/notification')
@stack('js')
<script type="text/javascript">

$(document).ready(function (e) {
   
  $('.notification-icon').on(function (i, v){
        if($(this).attr('data-count') >= 1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });

  $('.tooltipped').tooltip({delay: 50});
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true, // Activate on hover
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
    }
  );
 $('#input-src').keyup(function(){
  var str = $('#input-src').val();
  var dataString = 'q='+ str;
  $.ajax({
            type: "get",
            url: "{{url('/find')}}",
            data: dataString,
            cache: false,
            success: function(html)
                {
                    $("#result").html(html).show();
                }
        });
 return false;    
});
 
$("#result").on("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.judul_artikel').html(); 
    var decoded = $("<div/>").html($name).text();
    $('#input-src').val(decoded);
});
 
$(document).on("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("src-input")){
        $("#result").fadeOut(); 
    }
});
 
$('#input-src').click(function(){
    $("#result").fadeIn();
});
  $("#myTab a[href='#latest']").on('click', function(){
         $("#myTab a[href='#latest']").tab('show');
  });
  $("#myTab a[href='#recomend']").on('click', function(){
         $("#myTab a[href='#recomend']").tab('show');
  });

  $(window).on("load", function() {
      $('.flexslider').flexslider({
       animation: "slide"
     });
   });
  $('.button-collapse').sideNav({

      menuWidth: 250,

      edge: 'left',

      closeOnClick: true,

      draggable: true

    });
  $('.side-profile-nav').sideNav({

      menuWidth: 250,

      edge: 'right',

      closeOnClick: true,

      draggable: true

    });

 });
</script>
</body>
</html>