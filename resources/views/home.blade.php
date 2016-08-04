@extends('layouts.app')

@section('content')
<div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">



<table  id="terter"  class="dt-responsive nowrap display table-responsive table-hover table" width="100%">
  <thead>
    <tr>
       <th>Full Name</th>
      <th>Birthdate</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Mobile No</th>
      <th>Action</th>
    </tr>
  </thead>

    <tfoot>
    
      <tr>
        <th>Full Name</th>
      <th>Birthdate</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Mobile No</th>
      <th>Action</th>
    </tr>
  </tfoot> 


  <tbody>
  @foreach($employees as $employee)
     <tr>
            <td>{{$employee->first_name}} {{$employee->middle_name}}, {{$employee->last_name}}</td>
            <td>{{$employee->birthdate->format('Y-m-d')}}</td>
            <td>{{$employee->age}}</td>
            <td>{{$employee->gender}}</td>
            <td>{{$employee->mobile_no}}</td>
            <td>
                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                <a href="#" class="btn btn-default btn-sm">Delete</a>
            </td>
   
    </tr>
     @endforeach
  </tbody>
</table> 



       </div>
            </div>


@endsection
