@extends('layouts.app')

@section('content')

 <div class="row">

<h1 class="page-header">All Employees</h1>
<ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li class="active"><a href="{{url('employees')}}">Employees</a></li>
</ul>


  <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Employees 
    <a href="{{url('/employees/create')}}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Employee</a>
    </h3>
  </div>
  <div class="panel-body">
   
      <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive" width="100%">
              <thead>
                <tr >
                  <th></th>
                  <th>Employee Id</th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                    <th>Age</th>
                  <th>Date Hired</th>
                  <th>Employee type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Employee Id</th>
                  <th>Full Name</th>
                   <th>Position</th>
                  <th>Status</th>
                  <th>Age</th>
                  <th>Date Hired</th>
                   <th>Employee type</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($employees as $employee)
                <tr>
                  <td>
                  <img class="img-responsive img-circle" style="width: 35px; height: auto;" src="{{asset('/avatar/'.$employee->avatar)}}">
                  </td>
                  <td>
                  {{$employee->id}}
                  </td>
                  <td>
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}    
                  </td>
                  <td>
                  @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
                  </td>
                  <td>
                  @foreach($employee->statuses as $status)
                    {{$status->name}}
                  @endforeach
                  </td>
                  <td>
                   {{$employee->age}}
                  </td>
                  <td>
                      {{ (date("d/m/Y", strtotime($employee->date_hired)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($employee->date_hired)) )  }}
                  </td>
                  <td>
                      @foreach($employee->conditions as $condition)
                      {{ $condition->name }}
                      @endforeach

                  </td>
                  <td>
        

                  <div class="btn-group">
  <a href="#" class="btn btn-primary">Actions</a>
  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a data-toggle="modal" data-target=".bs-edit{{$employee->id}}-modal-lg" href="">View Details</a></li>
    <li><a href="{{url('employees/'.$employee->id.'/edit')}}">Update Status</a></li>
   
  </ul>
</div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>


  </div>
</div>






               <!-- show trucks and customer data -->
 @foreach($employees as $employee)
<!-- modal edit form -->
<div class="modal fade bs-edit{{$employee->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">View details</h4>
      </div>
      <div class="modal-body">


              <div class="row">
        <div class="col-md-12">
            <div class="panel-body">

                <center>
                <img class="img-circle img-responsive" style="margin-bottom:20px; width:150px; height:auto; " src="{{asset('/avatar/'.$employee->avatar)}}">
                </center>


              <ul class="nav nav-tabs">
              <li class="active"><a href="#personal-{{$employee->id}}" data-toggle="tab">Personal Information</a></li>
              <li><a href="#contact-{{$employee->id}}" data-toggle="tab">Contact Information</a></li>
              <li><a href="#job-{{$employee->id}}" data-toggle="tab">Job Information</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="personal-{{$employee->id}}">
                <p class="padding: 10px;">
                  
                   <h3>Personal Information</h3>
                          <table class="table table-striped table-hover ">
                        <tbody>
                          <tr>
                            <td>Full Name</td>
                            <td>{{$employee->first_name}} {{$employee->middle_name}}, {{$employee->last_name}}</td>
                          </tr>
                              <tr>
                            <td>Birthdate:</td>
                            <td> {{  date('m/d/Y', strtotime($employee->birthdate))  }}</td>
                          </tr>

                          <tr>
                            <td>   Age:</td>
                            <td>   {{$employee->age}}</td>
                          </tr>
                        <tr>
                            <td>Civil Status:</td>
                            <td>{{$employee->civil_status}}</td>
                          </tr> 

                           <tr>
                            <td> Address:</td>
                            <td>{{$employee->address}}</td>
                          </tr>

                        <tr>
                            <td> Gender:</td>
                            <td>{{$employee->gender}}</td>
                          </tr> 
                           </tbody>
                      </table>  

                </p>
              </div>


                <div class="tab-pane fade" id="contact-{{$employee->id}}">
                <p class="padding: 10px;">
                  
                   <h3>Contacts Information</h3>
                          <table class="table table-striped table-hover ">
                          <tbody>
                            <tr>
                              <td>  Mobile Number:</td>
                              <td> {{$employee->mobile_no}}</td>
                            </tr>

                             <tr>
                              <td> Telephone Number:</td>
                              <td> {{$employee->telephone}}</td>
                            </tr>
                             </tbody>
                        </table>  

                </p>
              </div>


                <div class="tab-pane fade" id="job-{{$employee->id}}">
                <p class="padding: 10px;">
                    
                    <h3>Job Information</h3>



          <table class="table table-striped table-hover ">
                  <tbody>
                    <tr>
                      <td>   Employee Status:</td>
                      <td>
                           @foreach($employee->statuses as $status)
                      {{$status->name}}
                    @endforeach

                      </td>
                    </tr>

                        <tr>
                      <td> Position:</td>
                      <td>
                      @foreach($employee->basics as $basic)
                                    {{$basic->position}}
                                  @endforeach
                                  @foreach($employee->quantities as $quantity)
                                    {{$quantity->position}}
                                  @endforeach

                      </td>
                    </tr>


                          <tr>
                      <td>Date hired:</td>
                      <td>
                      {{  date('m/d/Y', strtotime($employee->date_hired))  }}
                      </td>
                    </tr>


                           <tr>
                      <td>Pagibig Number:</td>
                      <td>
                    {{$employee->pagibig_no}}

                      </td>
                    </tr>



                           <tr>
                      <td> SSS Number:</td>
                      <td>
                   {{$employee->sss_no}}

                      </td>
                    </tr>


                         <tr>
                      <td> Salary Type:</td>
                      <td>
                    {{$employee->salary_type}}

                      </td>
                    </tr>
                     </tbody>
                </table>  
                </p>
               </div>


            </div>
                    
            </div>
        </div>
    </div><!-- end row -->


      </div><!-- end modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
               
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->      
       @endforeach
<!-- end show data for trucks and customer -->



 </div><!-- end row -->


@endsection