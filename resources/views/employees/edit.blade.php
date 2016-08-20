@extends('layouts.app')

@section('content')

 <h1 class="page-header">Edit Employee</h1>

         {!! Form::model($employee, ['method' => 'PATCH', 'action' => ['EmployeesController@update', $employee->id], 'class' => 'form-horizontal',  'files' => true, 'name' => 'autoSumForm' ]) !!} 
    {!! csrf_field() !!}
                    
        
                    
    @include('employees.form', ['submitButtonText' => 'Submit'])



		{!! Form::close() !!}

                

@endsection