@extends('template/b_index')

@section('content')

  <div class='col-sm-4 col-md-4'>
      @if (Session::has('emailsuccess'))
    <div class="alert alert-info animated bounceIn">
        <ul>
          <li><i class="fa fa-warning"></i> {{ Session::get('emailsuccess') }}</li>
        </ul>
    </div>
    @endif
    </div>
  <div id="login-page">
    <div class="col s12 m4 l4 card-panel z-depth-4 login-form">
     <form action="{{ URL('/logins') }}" method="post" class="col s12 m4 l4">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="log-head">
          <span><b>LOGIN</b></span>
      </div>
      <hr/>
        <div class="row margin">
          <div class="input-field col s12 @if ($errors->has('email')) has-error @endif">
            <i class="mdi mdi-email prefix"></i>
            <input class="validate" name="email" id="email" value="{{Input::old('email')}}" type="email" required>
            <label for="email">Email</label>
            <span>@if ($errors->has('email'))<h6 class="animated zoomIn">{{$errors->first('email')}} <i class="mdi mdi-alert-octagon"></i></h6>@endif</span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12 @if ($errors->has('password')) has-error @endif">
            <i class="mdi mdi-lock prefix"></i>
            <input id="password" class="password" name="password" type="password" value="{{Input::old('password')}}" required>
            <label for="password">Password</label>
            <span>@if ($errors->has('password'))<h6 class="animated zoomIn">{{$errors->first('password')}}</h6>@endif</span>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
              <span class="right"><a href="#">Lupa password ?</a></span>
          </div>
        </div>
        <div class="login-button">
          <div class="input-field col s12 center">
            <button class="btn-large waves-effect waves-light light-blue darken-3 z-depth-3 btn-log" type="submit"><i class="mdi mdi-login left"></i>Masuk</button>
          </div>
        <div class="input-field col s12">
          </div>
        </div>
   </div>
  </form>
 </div>
</div>
@endsection