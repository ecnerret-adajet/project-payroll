@extends('layouts.app')

@section('content')

 <h1 class="page-header">All Announcements
<a href="{{url('/announcements/create')}}" class="btn pull-right btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Announcement</a>
 </h1>



 <table id="table-data" class=" dt-responsive nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr class="info">
                  <th>Title</th>
                  <th>Body</th>
                  <th>Publish Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr class="info">
               <th>Title</th>
                  <th>Body</th>
                  <th>Publish Date</th>
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
                </tr>
              @endforeach
              </tbody>
            </table>





@endsection