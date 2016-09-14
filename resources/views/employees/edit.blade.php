@extends('layouts.app')

@section('content')

 <h1 class="page-header">Edit Employee</h1>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

         {!! Form::model($employee, ['method' => 'PATCH', 'action' => ['EmployeesController@update', $employee->id], 'class' => 'form-horizontal',  'files' => true, 'name' => 'autoSumForm' ]) !!} 
    {!! csrf_field() !!}
                    
        
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

                

@endsection