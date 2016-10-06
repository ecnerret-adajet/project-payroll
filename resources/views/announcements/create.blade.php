@extends('layouts.app')

@section('content')

<div class="row">

 <h1 class="page-header">New Announcement</h1>

  <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('announcements')}}">All announcements</a></li>
  <li class="active"><a href="{{url('announcements/create')}}">Add announcement</a></li>
</ul>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Announcement
    <a class="btn btn-info" href="{{url('announcements')}}">
  <i class="fa fa-bullhorn" style="padding-right: 5px;" aria-hidden="true"></i>  All Announcements
    </a>
    </h3>
  </div>
  <div class="panel-body">
     {!! Form::model($announcement = new \App\Announcement,  ['class' => 'form-horizontal',  'url' => 'announcements',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'announcementsForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('announcements.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}
  </div>
</div>


       

</div>

                

@endsection