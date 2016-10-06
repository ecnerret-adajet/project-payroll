@extends('layouts.app')

@section('content')





         @if(Auth::user()->hasRole('Administrator'))
         @else
            

            <div id="para1" class="text-center" style="font-size: 30px;"></div>
          

          @endif

        @permission('role-create')

          <div class="row" >
<div class="row">
          <div class="col-md-12">

          <h1 class="page-header">Dashboard 


 </h1>



      <ul class="breadcrumb">
  <li class="active">Home</li>
</ul>

</div>

</div><!-- end row -->

    <div class="row">
          <div class="col-md-12">

          @foreach($announcements as $announcement)
         <div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>{{$announcement->title}}</strong> - {{$announcement->body}}.
</div>
          @endforeach
          </div>
          </div><!-- end announcement -->

<div class="row">

 
              <!-- Info Boxes Style 2 -->
              <div class="col-md-3">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-people"></i></span>
                <div class="info-box-content bg-aqua">
                  <span class="info-box-text">Total Employee</span>
                  <span class="info-box-number">{{$employees->count()}}</span>
                   <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                 
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- end cold-md-4 -->

                 <div class="col-md-3">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-star-half"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Probationary</span>
                  <span class="info-box-number">
                       @foreach($status->slice(1,1) as $statuss)
                          {{ $statuss->employees->count() }}
                      @endforeach
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                  </div>
                  <span class="progress-description">
                   
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div>

                 <div class="col-md-3">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-star"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Regular Employee</span>
                  <span class="info-box-number">
                     @foreach($status->slice(0,1) as $statuss)
                          {{ $statuss->employees->count() }}
                      @endforeach
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div>

                 <div class="col-md-3">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-locked-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Administrators</span>
                  <span class="info-box-number">
                      @foreach($users->slice(0,1) as $user)
                          {{ $user->roles->count() }}
                      @endforeach
                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                  </div>
                  <span class="progress-description">
            
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div>
             

            <div class="col-md-12">

            <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Present Employee</h3>
  </div>
  <div class="panel-body">
     @role('Administrator')
     
            <table id="table-data" class=" dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                  <th></th>
                     <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th></th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Time In</th>
                  <th>Time Out</th>
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
                                   
                  @foreach($employee->attendances->slice(1,1) as $attendances)
                    {{$attendances->time_in}}
                  @endforeach

                  </td>
                  <td>
                      @foreach($employee->attendances->slice(0,1) as $attendances)
                    {{$attendances->time_out}}
                  @endforeach
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            @endrole

  </div>
</div>
            </div>

         

         </div>


           
          @endpermission
        
     
      


         















         
 

@endsection

