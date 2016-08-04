@extends('layouts.app')

@section('content')


	<div class="panel panel-default">
                <div class="panel-heading">Add Employee</div>
                <div class="panel-body">

        {!! Form::model($employee = new \App\Employee,  ['class' => 'form-horizontal',  'url' => 'employees',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'employeesForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}





                </div>
            </div>


                    








@endsection