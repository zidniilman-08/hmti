<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HMTI | Admin Panel</title>
  
<link rel="shortcut icon" href="{{asset('assets/img/hmti/logo.png')}}">
  
  {!! Html::style('assets/css/bootstrap/dist/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/bootstrap/dist/css/bootstrap.css') !!}
  {!! Html::style('assets/css/sweetalert.css') !!}
  {!! Html::style('assets/css/font-awesome.min.css') !!}
  {!! Html::style('assets/css/mystyle.css') !!}
  {!! Html::style('assets/css/AdminLTE.css') !!}
  {!! Html::style('assets/css/skins/_all-skins.min.css') !!}
  {!! Html::style('assets/css/animate.min.css') !!}
  {!! Html::style('assets/css/animate.css') !!}
  {!! Html::style('assets/css/select2.min.css') !!}
  {!! Html::style('assets/css/imgareaselect.css') !!}
  {!! Html::style('assets/plugins/iCheck/flat/red.css') !!}
  {!! Html::style('assets/materialize/css/materialdesignicons.min.css') !!}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jcrop/css/jquery.Jcrop.min.css') }}">
  {!! Html::style('assets/css/bootstrap-tagsinput.css') !!}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/af-2.2.0/b-1.4.0/b-flash-1.4.0/b-print-1.4.0/r-2.1.1/sc-1.4.2/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}">

  <script type="text/javascript" src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
  {!! Html::script('assets/js/jquery.form.min.js') !!}

  @yield('head')

  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>
</head>  

<body class="hold-transition {{Auth::user()->skin}} {{Auth::user()->menu}} sidebar-mini">

  <div class="wrapper" id="app">
     
    @include('layouts.header')
    
    @include('layouts.notif')

    @include('layouts.sidebar')

  
    @yield('content')

    @include('layouts.footer')

  </div>


  {!! Html::script('assets/plugins/fullcalendar/lib/jquery-ui.min.js') !!}
  {!! Html::script('assets/css/bootstrap/dist/js/bootstrap.min.js') !!}
  {!! Html::script('assets/js/sweetalert.min.js') !!}
  {!! Html::script('assets/js/tether.min.js') !!}
  {!! Html::script('assets/js/icheck.min.js') !!}
  {!! Html::script('assets/js/app.min.js') !!}
  <script type="text/javascript" src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/chartjs/Chart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/jcrop/js/jquery.Jcrop.min.js')}}"></script>
  {!! Html::script('assets/js/canvas-toBlob.js') !!}
  {!! Html::script('assets/js/select2.full.min.js') !!}
  {!! Html::script('assets/js/tooltip-viewport.js') !!}
  {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}
  {!! Html::script('assets/editor/ckeditor/ckeditor.js') !!}
  {!! Html::script('assets/editor/ckeditor/config.js') !!}
  {!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}
  {!! Html::script('assets/js/bootstrap-tagsinput.min.js') !!}
  <script src="{{ asset('assets/js/toastr.js') }}"></script>
  {!! Html::script('assets/plugins/fullcalendar/lib/moment.min.js') !!}
  {!! Html::script('assets/plugins/fullcalendar/fullcalendar.js') !!}
  {!! Html::script('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/af-2.2.0/b-1.4.0/b-flash-1.4.0/b-print-1.4.0/r-2.1.1/sc-1.4.2/datatables.min.js"></script>
  {!! Html::script('assets/js/bokura.js') !!}
  <script src="{{ asset('assets/plugins/vue/vue.min.js') }}"></script>
  @include('sweet::alert')
  
<script>
  
  Vue.component('users', {

    template: `
     <form clas="rol">
        <div class="col-lg-4" v-for="user in users">
          <div class="box box-widget widget-user-2" >
            <div class="widget-user-header">
              <div class="widget-user-image">
                <img class="img-circle" v-bind:src="user.image" alt="User Avatar">
              </div>
              <h3 class="widget-user-username">@{{ user.username }} </h3>
              <h5 class="widget-user-desc">@{{ user.universitas }}</h5>
            </div>

            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a><i class="fa fa-calendar"></i> Dibuat<span class="pull-right" style="color:#00a65a;">@{{ user.created_at }}</span></a></li>
                <li><a><i class="fa fa-gears"></i> Hak Akses<span class="pull-right" style="color:#3c8dbc">@{{ user.hak_akses }}</span></a></li>
                 <p></p>
              </ul>
              <div style="padding-left:5px;"><a href="#" class="btn btn-default tooltip-bottom" title="Preview user"><i class="fa fa-eye" style="color:#3c8dbc"></i></a>
               <a v-bind:href="'hapus_user/' + user.id" class="btn btn-default hapus_user tooltip-bottom" title="Hapus user"><i class="fa fa-trash" style="color:#dd4b39"></i></a></div>
            </div>
          </div>
        </div>
      </form>`,

    data: function() {
      return {
        users: []
      }
    },

    created: function() {
      this.getUsers();
    },

    methods: {
      getUsers: function() {
        $.getJSON("{{ route('getUser') }}", function(users) {
          this.users = users;
        }.bind(this));
      }
    }

  });

  Vue.component('notification', {

    template: `
         <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">@{{notifs.length}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have @{{notifs.length}} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li v-for="notif in notifs">
                    <a v-bind:href="notif.data.action">
                      <i class="fa fa-users text-aqua"></i>@{{notif.data.message}}
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#" @click="markNotificationAsRead">Read all</a></li>
           </ul>
         </li>`,

    data: function() {
      return {
        notifs: []
      }
    },

    created: function() {
      this.getNotifs();
    },

    methods: {
      getNotifs: function() {
        $.getJSON("{{ route('getNotif') }}", function(notifs) {
          this.notifs = notifs;
        }.bind(this));
      },
      markNotificationAsRead() {
      
        $.get("{{URL('/markAsRead') }}");
      
       }

    }

 
  });

  new Vue({
    el: '#app',
  });

</script>
@yield('footer')


@stack('script')
</body>
</html>