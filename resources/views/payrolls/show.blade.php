@extends('layouts.app')
@section('content')


<h2 class="page-header">Payslip</h2>
<div class="row">
<div class="col-md-6">


<table class="table">
  <tbody>
    <tr>
      <td>Company:</td>
      <td class="text-right"> 
        MRQK
       </td>
  
    </tr>

     <tr>
      <td>Date Period:</td>
       <td class="text-right"> 
            
       </td>
  
    </tr>


    <tr>
      <td>Name:</td>
         <td class="text-right"> 
     	 {{$employee->first_name}}
       </td>
  
    </tr>

    <tr>
      <td>Position:</td>
         <td class="text-right"> 
     	 {{$employee->id}}
       </td>
  
    </tr>

      <tr>
      <td>Tax Status:</td>
         <td class="text-right"> 
       </td>
  
    </tr>



  </tbody>
  </table>
					

</div>

<div class="col-md-6">

<table class="table">
  <tbody>
    <tr>
      <td>Basic Pay:</td>
      <td class="text-right"> 
     	 {{$payroll->basic_pay}}
       </td>
  
    </tr>
    <tr>
      <td>Meal Allowance:</td>
         <td class="text-right"> 
     	 {{$payroll->meal_allowance}}
       </td>
  
    </tr>

      <tr>
      <td>Transportation:</td>
         <td class="text-right"> 
     	 {{$payroll->transportation}}
       </td>
  
    </tr>

   

       <tr  class="info">
      <td>Gross Pay:</td>
        <td class="text-right"> 
     	<?php
     		$total = 0;
     		$total = $payroll->basic_pay + $payroll->meal_allowance + $payroll->transportation;

     	?>

     	{{$total}}
       </td>
      </tr>


  </tbody>
  </table>


  <table class="table">
  <tbody>
  
    <tr>
      <td>SSS Contribution:</td>
         <td class="text-right"> 
     {{$payroll->sss_contribution}}
       </td>
  
    </tr>

    

       <tr>
      <td>Pagibig Contribution:</td>
        <td class="text-right"> 
     	{{$payroll->pagibig_contribution}}
       </td>
      </tr>

        <tr>
      <td>Total deductions:</td>
        <td class="text-right"> 
     	
          <?php
        $deduct = 0;
        $deduct =  $payroll->sss_contribution - $payroll->pagibig_contribution;

      ?>

      {{$deduct}}
       </td>
      </tr>

        <tr  class="info">
      <td>Net Pay:</td>
        <td class="text-right"> 

          <?php
        $net_pay = 0;
        $net_pay = $total  - $payroll->sss_contribution - $payroll->pagibig_contribution;

      ?>

      {{$net_pay}}
       </td>
      </tr>


  </tbody>
  </table>
</div>
</div><!-- end row -->

<div class="row">
<div class="col-md-6">

</div>

<div class="col-md-6">
<a href="#" class="btn btn-primary pull-right text-uppercase"><i class="fa fa-print"></i> Print payslip</a>
</div>
</div><!-- end row -->






@endsection