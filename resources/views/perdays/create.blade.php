@extends('layouts.app')
@section('content')

<div class="row">
<h1 class="page-header">Create Record</h1>
<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Per Quantity</a></li>
  <li><a href="#">Create Record</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Create Record </h3>
  </div>
  <div class="panel-body">



        {!! Form::model($perday = new \App\Perday,  ['class' => 'form-horizontal',  'url' => 'perdays',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'perdaysForm'])!!}
        {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('perdays.form', ['submitButtonText' => 'Submit'])






    {!! Form::close() !!}
   


  </div>
</div>



</div><!-- end row -->


@endsection