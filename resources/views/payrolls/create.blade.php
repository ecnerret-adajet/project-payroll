@extends('layouts.app')
@section('content')

<ul class="breadcrumb" style="margin-top: 50px;">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Payslip</a></li>
  <li><a href="#">Create Payslips</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Create Payslips </h3>
  </div>
  <div class="panel-body">



        {!! Form::model($payroll = new \App\Payroll,  ['class' => 'form-horizontal',  'url' => 'payrolls',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'payrollsForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('payrolls.form', ['submitButtonText' => 'Submit'])






		{!! Form::close() !!}
   


  </div>
</div>


@endsection