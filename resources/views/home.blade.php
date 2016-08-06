@extends('layouts.app')

@section('content')


        <h1 class="page-header">Dashboard</h1>


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
                    @foreach($status->slice(2,1) as $statuss)
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
                  <span class="info-box-number">{{$users->count()}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        
          <h3 class="sub-header">Latest Announcement</h3>
          <div class="row">
          <div class="col-md-12">
         <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
</div>
          </div>
          </div>



          <h3 class="sub-header">Daily Time Records</h3>

            <table id="table-data" class=" dt-responsive nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr class="info">
                  <th></th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Age</th>
                  <th>Date hired</th>
                </tr>
              </thead>
              <tfoot>
                <tr class="info">
                    <th></th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Status</th>
                  <th>Age</th>
                  <th>Date hired</th>
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
                    {{$employee->age}}
                  </td>
                  <td>
                 {{ (date("d/m/Y", strtotime($employee->date_hired)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($employee->date_hired)) )  }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

















         
 

@endsection

