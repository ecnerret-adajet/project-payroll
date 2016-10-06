@extends('layouts.app')

@section('content')

<div class="row">

 <h1 class="page-header">All Announcements

 </h1>
  <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li class="active"><a href="{{url('announcements')}}">All announcements</a></li>
</ul>

 <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Announcements

    <a href="{{url('/announcements/create')}}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Announcement</a>
    </h3>
  </div>
  <div class="panel-body">
   
 <table id="table-data" class="table-bordered dt-responsive nowrap display table-responsive table-hover table table-responsive" width="100%">
              <thead>
                <tr >
                  <th>Title</th>
                  <th>Body</th>
                  <th>Publish Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr >
               <th>Title</th>
                  <th>Body</th>
                  <th>Publish Date</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($announcements as $announcement)
                <tr>
                  <td>
                  {{$announcement->title}}
                  </td>
                  <td>
                  {{$announcement->body}}   
                  </td>
                  <td>
                 {{  date("d/m/Y", strtotime($announcement->publish_at))  }}
                  </td>
                  <td>

          @permission('role-delete')
      {!! Form::open(['method' => 'DELETE','route' => ['announcements.destroy', $announcement->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
          @endpermission

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
  </div>
</div>









</div>

@endsection