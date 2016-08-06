@extends('layouts.app')

@section('content')

 <h1 class="page-header">All Employee
<a href="{{url('/employees/create')}}" class="btn pull-right btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Employee</a>
 </h1>

  <table id="table-data" class=" dt-responsive nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr class="info">
                  <th></th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr class="info">
                  <th></th>
                  <th>Full Name</th>
                   <th>Position</th>
                  <th>Status</th>
                  <th>Time In</th>
                  <th>Time Out</th>
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
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}    
                  </td>
                  <td>
                  @foreach($employee->positions as $position)
                    {{$position->name}}
                  @endforeach
                  </td>
                  <td>
                  @foreach($employee->statuses as $status)
                    {{$status->name}}
                  @endforeach
                  </td>
                  <td>
                    00-00-00
                  </td>
                  <td>
                    00-00-00
                  </td>
                  <td>
                  <a class="bootstrap-modal-form-open" data-toggle="modal" data-target=".bs-edit{{$employee->id}}-modal-lg" href="" style="padding-right: 10px;">
                  <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                  </a>

                  <a href="{{url('/employees/'.$employee->id.'/edit')}}">
                  <i class="fa fa-cog fa-2x" aria-hidden="true"></i>
                  </a>



                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>





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
      <td> Gender:</td>
      <td>{{$employee->gender}}</td>
    </tr> 
     </tbody>
</table>  

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

      <tr>
      <td> Address:</td>
      <td>{{$employee->address}}</td>
    </tr>

      <tr>
      <td> Address:</td>
      <td>{{$employee->address}}</td>
    </tr>
   
     </tbody>
</table>  


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
       @foreach($employee->positions as $position)
      {{$position->name}}
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
   
    
     







                      



  



                        
                        


            

            

 


                    
            </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
               
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->      
       @endforeach
<!-- end show data for trucks and customer -->



@endsection