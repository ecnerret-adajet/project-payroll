@extends('layouts.app')

@section('content')


        <h1 class="page-header">Dashboard</h1>

         @if(Auth::user()->hasRole('Administrator'))
         @else
            

            <div id="para1" class="text-center" style="font-size: 30px;"></div>
          

          @endif

        @permission('role-create')
          <div class="row" >
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-ios-people"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Employee</span>
                  <span class="info-box-number">{{$employees->count()}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-ios-star"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Regular</span>
                  <span class="info-box-number">
                    @foreach($status->slice(0,1) as $statuss)
                          {{ $statuss->employees->count() }}
                      @endforeach
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-ios-star-half"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Probationary</span>
                  <span class="info-box-number">
                        @foreach($status->slice(1,1) as $statuss)
                          {{ $statuss->employees->count() }}
                      @endforeach
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-ios-locked-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Admin</span>
                  <span class="info-box-number">
                      @foreach($users->slice(0,1) as $user)
                          {{ $user->roles->count() }}
                      @endforeach
                 
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          @endpermission
        
          <h3 class="sub-header">Latest Announcement</h3>
          <div class="row">
          <div class="col-md-12">

          @foreach($announcements as $announcement)
         <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>{{$announcement->title}}</strong> - {{$announcement->body}}.
</div>
          @endforeach
          </div>
          </div>


          @permission('role-create')
          <h3 class="sub-header">Daily Time Records</h3>

            <table id="table-data" class=" dt-responsive nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr class="info">
                  <th></th>
                     <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Time In</th>
                  <th>Time Out</th>
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
            @endpermission
















         
 

@endsection

