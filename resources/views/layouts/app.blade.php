<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payroll</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/style.css')}}">
     <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />


        <!-- select 2 plugin -->
       <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/select2-bootstrap.min.css') }}" rel="stylesheet" />


      <!-- Datatables styles   -->
    <link href="{{ asset('/css/dataTables.tableTools.css') }}" rel="stylesheet" >
    <link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/buttons.bootstrap.min.css') }}" rel="stylesheet" /> 




    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    MRQK Payroll
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
    <div class="row">
        <div class="col-md-3">
             <div class="panel panel-default">
                <div class="panel-heading">Main Sidebar
                     <span class="pull-right">
                    <a href="{{url('/employees/create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>
                </span>
                </div>

               
                <div class="panel-body main-sidebar">

<ul class="list-group">
  <li class="list-group-item" style="border-top: 0 ! important;">
  <a href="{{url('/home')}}" class="main-side"> <i class="fa fa-tachometer" aria-hidden="true"></i>  Dashboard </a>
  </li>
  <li class="list-group-item">
 <a href="{{url('/employees')}}" class="main-side">  <i class="fa fa-briefcase" aria-hidden="true"></i>  Employees </a>
  </li>
  <li class="list-group-item">
   <i class="fa fa-clock-o" aria-hidden="true"></i> Time Records
  </li> 

   <li class="list-group-item" style="border-bottom: 0 ! important;">
   <i class="fa fa-file-text-o" aria-hidden="true"></i> Payslip
  </li>
</ul>


                
                





                </div>
            </div>
        </div>


         <div class="col-md-9">


          @yield('content')
            
        </div>
    </div>
</div>







   









  <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- datatables   -->  
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.columnFilter.js') }}"></script>
    <script src="{{ asset('js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>

    <script type="text/javascript">    
    $(document).ready(function() {
    $('#terter').DataTable();
      });
    </script>

    <!-- select 2 plugin -->
    <script src="{{ asset('/js/select2.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>



     <script type="text/javascript">
         $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
    </script>


</body>
</html>
