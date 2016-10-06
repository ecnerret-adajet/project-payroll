<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/img/logo.png')}}" style="height: 30px; width: auto;">

        <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

     <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

     <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->

    <!-- select 2 -->
    <link href="{{asset('/css/select2.min.css')}}" rel="stylesheet" />

    <!-- Datatables styles   -->
    <link href="{{ asset('/css/dataTables.tableTools.css') }}" rel="stylesheet" >
    <link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />  
    <link href="{{ asset('/css/buttons.bootstrap.min.css') }}" rel="stylesheet" />  
    <link href="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />  
  
         <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

      <!-- MetisMenu CSS -->
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  
    <style>
        body {
            font-family: 'Lato';
            font-weight: 400;
            font-size: 13px;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .nav-style{
    color: #fff ! important;
}
    </style>

    <title>MRQK Payroll</title>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="wrapper">

        <!-- Navigation -->
        @if(Auth::check())
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img class="img-responsive" style="width: 35px; height:auto; position: absolute; top: 10px; left: 10px;" src="{{asset('img/logo.png')}}"> <span style="margin-left: 40px; color: #fff;"> MRQK Management System</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">           
                <!-- /.dropdown -->
                <li class="dropdown">
                     <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                          
                  <img src="{{asset('/avatar/placeholder.png')}}" class="img-circle img-responsive " style="width: 35px; height:auto; position: absolute; top: 10px; left: 10px;" alt="User Image" />
                  <span style="color: #fff;">{{ Auth::user()->name }}</span>
                       
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


                        <li class="sidebar-search">
                         {{ Form::open(array('url' => '/search', 'method' => 'get')) }}
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search..." value="" name="q">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>


                            {!! Form::close() !!} 
                            <!-- /input-group -->
                        </li>

                        <li>
                            <a style="font-size: 15px;" href="{{url('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        @role('User')
                        <li>
                            <a style="font-size: 15px;"  href="{{url('/employees/'.Auth::user()->employees->id)}}"><i class="fa fa-database" aria-hidden="true"></i> My Information </a>
                        </li>
                        <li>
                            <a style="font-size: 15px;" href="{{url('/payrolls/'.Auth::user()->employees->id)}}"><i class="fa fa-database" aria-hidden="true"></i> My Payslips </a>
                        </li>   
                        <li>
                            <a style="font-size: 15px;" href="{{url('/attendances/'.Auth::user()->employees->id)}}"><i class="fa fa-database" aria-hidden="true"></i> My Attendance </a>
                        </li>   
                        @endrole

                        @role('Administrator')
                        <li>
                            <a style="font-size: 15px;" href="{{url('employees')}}"><i class="fa fa-database" aria-hidden="true"></i> Employee </a>
                           
                            <!-- /.nav-second-level -->
                        </li>  

                        <li>
                            <a style="font-size: 15px;" href="{{url('announcements')}}"><i class="fa fa-database" aria-hidden="true"></i> Annnouncements </a>
                           
                            <!-- /.nav-second-level -->
                        </li>        

                        <li>
                            <a style="font-size: 15px;" href="{{url('perdays')}}"><i class="fa fa-database" aria-hidden="true"></i> Per-day Records </a>
                           
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a style="font-size: 15px;" href="{{url('attendances')}}"><i class="fa fa-database" aria-hidden="true"></i> Time Records </a>
                           
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a style="font-size: 15px;" href="{{url('payrolls')}}"><i class="fa fa-database" aria-hidden="true"></i> Payslips </a>
                           
                            <!-- /.nav-second-level -->
                        </li>
                  
                
                       
                        <li>
                            <a style="font-size: 15px;" href="#"><i class="fa fa-database" aria-hidden="true"></i>  User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="{{url('/users')}}"><i class="fa fa-tags" aria-hidden="true"></i> All Users</a>
                                </li>
                                <li>
                                    <a href="{{url('/roles')}}""><i class="fa fa-tags" aria-hidden="true"></i> Manage Roles</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endrole
        

                      

              



                
                
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @endif
       
    


        <div id="page-wrapper">

                   

                        @yield('content')



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

   <script src="{{asset('js/sb-admin-2.js')}}"/></script>
   <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <!-- select2 js plugin -->
    <script src="{{asset('js/select2.min.js')}}"></script>
     <!-- bootstsrap modal -->
    <script src="{{ asset('/js/laravel-bootstrap-modal-form.js') }}"></script>
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


    <script src="https://raw.githubusercontent.com/moment/moment/develop/min/moment-with-locales.min.js"></script>
    <script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>



      <!-- InputMask -->
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>

      <script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="basicpay"){
            $(".employee_type").not(".basicpay").hide();
            $(".basicpay").show();
        }
        if($(this).attr("value")=="perquantity"){
            $(".employee_type").not(".perquantity").hide();
            $(".perquantity").show();
        }
      
    });
});
</script>

        <script type="text/javascript">
      $(function () {
 
        $("[data-mask]").inputmask();

       
      });
    </script>


    <!-- print payroll -->

    <script>
function myFunction() {
    window.print();
}
</script>







    <script>    
    $(document).ready(function() {
    $('#table-data').DataTable();
      });
    </script>

     <script>    
    $(document).ready(function() {
    $('#emp-data').DataTable();
      });
    </script>

     <script src="{{asset('/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
       <script>
       $(":file").filestyle({size: "sm", buttonName: "btn-primary", buttonBefore: true});
     </script>
  
  
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="http://v4-alpha.getbootstrap.com/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>


     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>


    <!-- select2 plugin -->
    <script>
      $(".select2").select2({
       placeholder: "Select an employee",
       allowClear: true
        });
    </script>

    <script>
      $(".select3").select2({
       placeholder: "Select an employee",
       allowClear: true
        });
    </script>

    <script>
    var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
    </script>

    <script type="text/javascript">
         $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
    </script>

       <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datepicker();
            });
        </script>



<script type="text/javascript">
            var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
        </script>

        <script type="text/javascript">
function dobcheck()
{
    var birth = document.getElementById('bday')
    if(birth != "")
    {

        var record=document.getElementById('bday').value.trim();
        var currentdate=new Date();    
        var day1 = currentdate3.getDate();   
        var month1 = currentdate3.getMonth();
        month1++;     
        var year11 = currentdate3.getFullYear()-17;
        var year2= currentdate3.getFullYear()-100;   
        var record_day1=record.split("/");
        var sum=record_day1[1]+'/'+record_day1[0]+'/'+record_day1[2];  
        var current= month1+'/'+day1+'/'+year11;
        var current1= month1+'/'+day1+'/'+year2;
        var d1=new Date(current)
        var d2=new Date(current1)
        var record1 = new Date(sum);      
        if(record1 > d1)
        {

            alert("Sorry ! Minors need parential guidance to use this website");
            document.getElementById('bday').blur();
            document.getElementById('bday').value="";
            document.getElementById('bday').focus();
            return false;
        }
    } 
}
</script>

   @include('flashy::message')

  </body>
</html>