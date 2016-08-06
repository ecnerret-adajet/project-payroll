@extends('layouts.app')

@section('content')

 <h1 class="page-header">New Announcement</h1>

        {!! Form::model($announcement = new \App\Announcement,  ['class' => 'form-horizontal',  'url' => 'announcements',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'announcementsForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('announcements.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

                

@endsection