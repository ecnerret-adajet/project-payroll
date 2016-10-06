@extends('layouts.app')

@section('content')

<div class="row">
 <h1 class="page-header">Per-dozen Maintenance</h1>

<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Per Quantity</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Daily Quantity Record <a href="{{url('/perdays/create')}}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Record</a></h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive" width="100%">
              <thead>
                <tr>
                  <th>Employeer Id</th>
                  <th>Employee Name</th>
                  <th>Job Description</th>
                  <th>Date</th>
                  <th>Rates Per-dozen</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Employeer Id</th>
                  <th>Employee Name</th>
                  <th>Job Description</th>
                  <th>Date</th>
                  <th>Rates Per-dozen</th>
                </tr>
              </tfoot>
              <tbody>
           @foreach($perdays as $perday)
                <tr>
                <td>
                @foreach($perday->employees as $employee)
                  {{$employee->id}} 
                  @endforeach
                </td>
            
                  <td>
                  @foreach($perday->employees as $employee)
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} 
                  @endforeach
                  </td>

                  <td>
                  @foreach($perday->employees as $employee)
                      @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
                  @endforeach
                  </td>

                  

                  <td>
                  {{ (date("d/m/Y", strtotime($perday->publish_date)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($perday->publish_date)) )  }}
                  </td>


                  <td>
                  {{$perday->total_quantity}} dozen
                  </td>
                 
                </tr>
            @endforeach
              </tbody>
            </table>



  </div>
</div>



</div>

@endsection

