@extends('layouts.app')

@section('content')

<div class="row">

 <h1 class="page-header">Add Employee</h1>
 <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('employees')}}">Employees</a></li>
  <li class="active"><a href="{{url('employees/create')}}">Add employees</a></li>
</ul>
 	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input. some fields are invalid<br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Employee</h3>
  </div>
  <div class="panel-body">
       {!! Form::model($employee = new \App\Employee,  ['class' => 'form-horizontal',  'url' => 'employees',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'employeesForm'])!!}
  		  {!! csrf_field() !!}
                    
        
                    
                  
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

  </div>
</div>



     

</div>

                

@endsection