@extends('layouts.app')
@section('content')


<ul class="breadcrumb no-print" style="margin-top: 50px;">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Payslip</a></li>
  <li><a href="#">Show</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title no-print"><i class="fa fa-file-text-o" aria-hidden="true"></i>  Payslip period </h3>
  </div>
  <div class="panel-body">

<div class="row">
<div class="col-md-6 print-style" >
    
<table class="table table-striped table-bordered table-hover ">

  <tbody>
  <tr>
      <th>Company Name</th>
      <td>MRQK Incorporated</td>
    </tr>

      <tr>
      <th>Employee Name</th>
      <td>
           @foreach($payroll->employees as $employee)
          {{$employee->full_name}}
        @endforeach        
      </td>
    </tr>


      <tr>
      <th>Position</th>
      <td>
           @foreach($payroll->employees as $employee)
               @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
        @endforeach        
      </td>
    </tr>

         <tr>
      <th>Payroll Period</th>
      <td>
              {{ (date("d/m/Y", strtotime($payroll->start_period)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($payroll->start_period)) )  }} - {{ (date("d/m/Y", strtotime($payroll->end_period)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($payroll->end_period)) )  }}
      </td>
    </tr>
 
    <tr>
      <th>Basic Pay</th>
      <td>
        @foreach($payroll->employees as $employee)
             {{ ($employee->salaries->basic_pay == null ? 'Per day basis' : $employee->salaries->basic_pay )}}
        @endforeach
      </td>
    </tr>

      <tr>
      <th>Total Perday Quantity</th>
      <td>
      <span style="display:none ! important"> 
         @foreach($payroll->employees as $employee)
               @foreach($employee->perdays as $perday)
                  {{ $sum += $perday->total_quantity }} 
               @endforeach
        @endforeach
        </span>

            {{$sum}}
      </td>
    </tr>

          <tr>
      <th>Attendance</th>
      <td>
          <span style="display: none ! important"> 
                  @foreach($payroll->employees as $employee)
                        @foreach($employee->attendances as $attendance)
                          {{$attendance->time_in}}
                          {{$attendance->id}}
                        @endforeach
                  @endforeach
                  </span>


                       {{  $payroll->start_period->diffInDays($payroll->end_period).' Day(s)' }}
      </td>
    </tr>


      <tr>
      <th>SSS</th>
      <td>
        @foreach($payroll->employees as $employee)
                  @foreach($employee->quantities as $quantity)
                    {{($quantity->position == null ? 100 : 0)}}
                  @endforeach
                  @foreach($employee->basics as $basic)
                    {{$ssspay =  $basic->position != null ? 100 : 0}}
                  @endforeach
        @endforeach   
      </td>
    </tr>

          <tr>
      <th>Pagibig</th>
      <td>
          @foreach($payroll->employees as $employee)
                  @foreach($employee->quantities as $quantity)
                    {{($quantity->position == null ? 100 : 0)}}
                  @endforeach
                @foreach($employee->basics as $basic)
                    {{$pagpay =  $basic->position != null ? 100 : 0}}
                  @endforeach
        @endforeach   
      </td>
    </tr>

         <tr>
      <th>Gross Net</th>
      <td>

     
      
       @foreach($payroll->employees as $employee)
          <span style="display: none ! important;">
                  @foreach($employee->quantities as $quantity)
                     {{$total = $quantity->salary * $sum}}
                  @endforeach
        </span>

         {{$total += $employee->salaries->basic_pay - $ssspay - $pagpay}}
        @endforeach


       
  
        
       
      </td>
    </tr>

     
 

  </tbody>
</table> 
  




</div>





</div>

<div class="row">
<div class="col-md-12 " >
    <button class="btn btn-primary pull-right no-print" onclick="myFunction()">Print Payslip</button>
</div>
</div>


  



 
</div>
  </div>
</div>








@endsection