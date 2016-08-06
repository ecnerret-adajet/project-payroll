@extends('layouts.app')

@section('content')

 <h1 class="page-header">Add Employee</h1>

        {!! Form::model($employee = new \App\Employee,  ['class' => 'form-horizontal',  'url' => 'employees',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'employeesForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

                

@endsection