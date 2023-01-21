@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Visitors Tracker
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Visitors</a></li>
        <li class="active"> Visitors Tracker</li>
      </ol>
    </section>
   
   <section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box box-danger">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
             <form>
              <table class="table table-bordered table-responsive">
              <div class="box-body check">
                <thead>
                  <th>No</th>
                  <th>Ip Address</th>
                  <th>Visit Date</th>
                  <th>Time Visit</th>
                  <th>Hits</th>
                </thead>
                @foreach($visitors as $visitor)
                <tr>
                  <td>{{$no++}}</td>
                  <?php $ip =  ip2long($visitor->ip_address);?>
     	            <td>{{long2ip($ip)}}</td>
                  <td>{{$visitor->visit_date}}</td>
                  <td>{{$visitor->visit_time}}</td>
                  <td>{{$visitor->hits}}</td>
                </tr>
               @endforeach
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
    </section>

</div>
 @endsection