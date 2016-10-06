@extends('layouts.app')

@section('content')

<div class="row">
<h1 class="page-header">Attendance</h1>
<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Attendance</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Daily Time Record </h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                </tr>
              </thead>
              <tfoot>
                   <tr>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                </tr>
              </tfoot>
              <tbody>
           @foreach($attendances as $attendance)


                <tr>


                  <td>
                    @foreach($attendance->employees as $employee)
                  {{$employee->id}}
                  @endforeach
                  </td>



                  <td>


                  @foreach($attendance->employees as $employee)
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} 
                  @endforeach

                  </td>

                  <td>
                     
                        {{   $attendance->created_at->format('Y-m-d')   }} 
                

                  </td>

                  <td>
                    @if(str_contains($attendance->time_out->format('Y-m-d h:i:s A'),' 12:00:00 AM'))
                    NO TIME IN
                       @else
                        <a href="" class="btn btn-primary btn-sm">TIME IN</a>      {{   $attendance->time_out->format(' h:i:s A')   }} 
                    @endif


                 
        
                  </td>



                  <td>
                 

                     @if(str_contains($attendance->time_in->format(' h:i:s A'),' 12:00:00 AM'))
                     NO TIME OUT
                       @else
                         <a href="" class="btn btn-danger btn-sm">TIME OUT</a>  {{  $attendance->time_in->format('h:i:s A')  }} 
                    @endif
        
                  </td>

                 

               
                 
                </tr>
            @endforeach
              </tbody>
            </table>



  </div>
</div>

</div>



@endsection

