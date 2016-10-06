@extends('layouts.app')

@section('content')

<div class="row">

 <h1 class="page-header">Edit Employee</h1>
  <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('employees')}}">Employees</a></li>
  <li class="active"><a href="{{url('employees/'.$employee->id.'/edit')}}">Edit employees</a></li>
</ul>
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


	<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Edit employee</h3>
  </div>
  <div class="panel-body">
        {!! Form::model($employee, ['method' => 'PATCH', 'action' => ['EmployeesController@update', $employee->id], 'class' => 'form-horizontal',  'files' => true, 'name' => 'autoSumForm' ]) !!} 
    {!! csrf_field() !!}
                    
        
                    
    @include('employees.form-edit', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}
  </div>
</div>

    


</div>
                

@endsection