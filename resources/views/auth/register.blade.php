@extends('template/b_index')

@section('content')
  <div id="register-page">
    <div class="col s12 m4 l4 card-panel z-depth-4 register-form">
    
     <form action="{{ URL('/registers') }}" method="post" class="col s12 m4 l4">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="log-head">
          <b>REGISTER</b>
      </div>

      <div class="row margin">
          <div class="input-field col s12 @if ($errors->has('email')) has-error @endif">
            <i class="mdi mdi-email prefix"></i>
            <input class="validate" name="email" id="email" value="{{Input::old('email')}}" type="email" required>
            <label for="email">Email</label>
            <span>@if ($errors->has('email'))<h6 class="animated zoomIn">{{$errors->first('email')}} <i class="mdi mdi-alert-octagon"></i></h6>@endif</span>
          </div>
        </div>
      
      <div class="row margin">
          <div class="input-field col s12 @if ($errors->has('username')) has-error @endif">
            <i class="mdi mdi-account-outline prefix"></i>
            <input id="username" class="username" name="username" type="text" value="{{Input::old('username')}}" required>
            <label for="username">Username</label>
            <span>@if ($errors->has('username'))<h6 class="animated zoomIn">{{$errors->first('username')}}</h6>@endif</span>
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

        <div class="row margin">
          <div class="input-field col s12 @if ($errors->has('confirm_password')) has-error @endif">
            <i class="mdi mdi-reload prefix"></i>
            <input id="re-password" class="re-password" name="confirm_password" type="password"  required>
            <label for="re-password">Re-write Password</label>
            <span>@if ($errors->has('confirm_password'))<h6 class="animated zoomIn">{{$errors->first('confirm_password')}}</h6>@endif</span>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12 center">
            <button  class="btn-large waves-effect waves-light light-blue darken-3  z-depth-3" type="submit"><i class="mdi mdi-login left"></i>Daftar</button>
          </div>
        <div class="input-field col s12">
          </div>
        </div>
   </div>
  </form>
 </div>
</div>
@endsection