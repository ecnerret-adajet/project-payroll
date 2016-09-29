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
<div class="col-md-12">
  <table class="table table-striped table-bordered table-hover ">

  <tbody>
  <tr>
  <td rowspan="2">
<img class="img-responsive" src="{{asset('img/logo.png')}}" style="width:100px; height:auto; padding:10px; display: block; margin: auto;">
  </td>

  <td width="40%">
   @foreach($payroll->employees as $employee)
          {{$employee->full_name}}
        @endforeach   
  </td>

  <td width="25%">
  <strong> Period: </strong> {{  date('m/d/Y', strtotime($payroll->start_period))  }} - {{  date('m/d/Y', strtotime($payroll->end_period))  }} 
  </td>
  </tr>

  <tr>
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

   <td>
      @foreach($payroll->employees as $employee)
              @foreach($employee->statuses as $status)
          {{$status->name}}
              @endforeach
        @endforeach  
  </td>

  </tr><!-- end table row -->

  <tr>
  <td colspan="2">
Basic Pay
  </td>

  <td colspan="2">
      @foreach($payroll->employees as $employee)
          {{ ($employee->salaries->basic_pay == null ? 'Per day basis' : 'PHP '.$employee->salaries->basic_pay.'.00' )}}
        @endforeach
  </td>

  </tr>

    <tr>
  <td colspan="2">
Total Perday Quantity
  </td>

  <td colspan="2">
  <span style="display:none ! important"> 
         @foreach($payroll->employees as $employee)
               @foreach($employee->perdays as $perday)
                  {{ $sum += $perday->total_quantity }} 
               @endforeach
        @endforeach 
        </span>

            {{$sum}} dozen
  </td>

  </tr>

    <tr>
  <td colspan="2">
Allowance
  </td>

  <td colspan="2">
      @foreach($payroll->employees as $employee)
         PHP {{$allowance = $employee->salaries->meal_allowance + $employee->salaries->transportation }}.00
        @endforeach   
  </td>

  </tr>


      <tr>
  <td colspan="2">
Attendance
  </td>

  <td colspan="2">
       <span style="display: none;"> 
             @foreach($employee->attendances as $attendance)
            {{    date('F d, Y h:i:s A', strtotime( $attendance->time_out))  }} timeout <br/>
            {{    date('F d, Y h:i:s A', strtotime( $attendance->time_in))  }} timein <br/>


            <br/>
             @endforeach
          </span>

        {{ $attendance->time_in->diffInDays($attendance->time_out) }} day



  </td>

  </tr>




        <tr>
  <td colspan="2">
Other Deductions
  </td>

  <td colspan="2">
    PHP {{$payroll->other_deductions}}.00 (Remarks: {{ $payroll->remarks }})
  </td>

  </tr>


          <tr>
  <td colspan="2">
SSS
  </td>

  <td colspan="2">
     @foreach($payroll->employees as $employee)
                  @foreach($employee->quantities as $quantity)
                   PHP {{($quantity->position == null ? 100 : 0)}}.00 
                  @endforeach
                  @foreach($employee->basics as $basic)
                  PHP {{$ssspay =  $basic->position != null ? 100 : 0}}.00
                  @endforeach
        @endforeach   
  </td>

  </tr>

      <tr>
  <td colspan="2">
Pagibig
  </td>

  <td colspan="2">
       @foreach($payroll->employees as $employee)
                  @foreach($employee->quantities as $quantity)
                   PHP {{($quantity->position == null ? 100 : 0)}}.00
                  @endforeach
                @foreach($employee->basics as $basic)
                  PHP {{$pagpay =  $basic->position != null ? 100 : 0}}.00
                  @endforeach
        @endforeach    
  </td>

  </tr>

        <tr>
  <td colspan="2" class="danger">
<strong>Gross Net</strong>
  </td>

  <td colspan="2" class="danger">
        
       @foreach($payroll->employees as $employee)
          <span style="display: none ! important;">
                  @foreach($employee->quantities as $quantity)
                     {{$total = $quantity->salary * $sum}}
                  @endforeach
        </span>

        PHP {{$total += $employee->salaries->basic_pay + $employee->salaries->meal_allowance +  $employee->salaries->transportation - $payroll->other_deductions - $ssspay - $pagpay}}.00


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