@extends('layouts.app')

@section('content')

<ul class="breadcrumb" style="margin-top: 50px;">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Attendance</a></li>
  <li><a href="#">Show Attendance</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> My time record </h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th>Employee Name</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                  <th></th>
                  <th>Employee Name</th>
                  <th>Time</th>
                </tr>
              </tfoot>
              <tbody>
          


                <tr>
                  <td>
                 @foreach($attendance->employees as $employee)
<img class="img-responsive img-circle" style="width: 35px; height: auto;" src="{{asset('/avatar/'.$employee->avatar)}}">
                 @endforeach
                  </td>
                  <td>


                  @foreach($attendance->employees as $employee)
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} 
                  @endforeach

            


                  </td>

                  <td>
                    @if(str_contains($attendance->time_out->format('Y-m-d h:i:s A'),' 12:00:00 AM'))
                       @else
                        <a href="" class="btn btn-primary btn-sm">TIME IN</a>      {{   $attendance->time_out->format('Y-m-d h:i:s A')   }} 
                    @endif


                     @if(str_contains($attendance->time_in->format('Y-m-d h:i:s A'),' 12:00:00 AM'))
                       @else
                         <a href="" class="btn btn-danger btn-sm">TIME OUT</a>       {{  $attendance->time_in->format('Y-m-d h:i:s A')  }} 
                    @endif

               
                   
             


        
                  </td>

                 

               
                 
                </tr>
        
              </tbody>
            </table>



  </div>
</div>



@endsection

