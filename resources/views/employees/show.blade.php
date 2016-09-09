@extends('layouts.app')
@section('content')



          <center style="margin-bottom: 20px; margin-top: 50px;">
                <img class="img-circle img-responsive" style="margin-bottom:20px; width:150px; height:auto; " src="{{asset('/avatar/'.$employee->avatar)}}">
          </center>


<ul class="nav nav-tabs">
  <li class="active"><a href="#personal" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Personal Information</a></li>
  <li><a href="#contact" data-toggle="tab"><i class="fa fa-phone" aria-hidden="true"></i> Contact Information</a></li>
  <li><a href="#job" data-toggle="tab"><i class="fa fa-suitcase" aria-hidden="true"></i> Job Information</a></li>
</ul>
<div id="myTabContent" class="tab-content">

  <div class="tab-pane fade active in" id="personal">
    <p style="padding: 10px;">
      
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

    </p>
  </div>

  <div class="tab-pane fade" id="contact">
    <p style="padding: 10px">
      
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


    </p>
  </div>

    <div class="tab-pane fade" id="job">
    <p style="padding: 10px">
      
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










@endsection