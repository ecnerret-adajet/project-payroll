@extends('layouts.app')

@section('content')

 <h1 class="page-header">Add Employee</h1>

 	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input. some fields are invalid<br>
		</div>
	@endif

        {!! Form::model($employee = new \App\Employee,  ['class' => 'form-horizontal',  'url' => 'employees',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'employeesForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

                

@endsection