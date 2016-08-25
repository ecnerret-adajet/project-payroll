@extends('layouts.app')

@section('content')

<ul class="breadcrumb" style="margin-top: 50px;">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Payslip</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Payslips <a href="{{url('/payrolls/create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Payslips</a></h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                  <th>Payroll Number</th>
                  <th>Date Period</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                  <th>Payroll Number</th>
                  <th>Date Period</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
           
                <tr>
                  <td>
                 
                  </td>
                  <td>


                  </td>

                  <td>

                  </td>
                 
                </tr>
              </tbody>
            </table>



  </div>
</div>



@endsection

