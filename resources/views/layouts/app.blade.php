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
  
  
    <style>
        body {
            font-family: 'Lato';
            font-weight: 400;
            font-size: 13px;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    <title>MQRK Payroll</title>

   

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link media="print" href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MQRK <small>PAYROLL</small></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                  <img src="{{asset('/avatar/placeholder.png')}}" class="img-circle img-responsive " style="width: 35px; height:auto; position: absolute; top: 10px; left: 10px;" alt="User Image" />
                  <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu" style="width:200px; border-left: 1px solid #95a5a6; border-bottom: 1px solid #95a5a6; border-radius:0;">
                  <!-- User image -->
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>
          </ul>
    
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">

            <li style="background-color: #95a5a6">

           
              <img src="{{asset('/img/logo.png')}}" style="width:100px; height:auto; padding:10px; display: block; margin: auto;"  class="img-circle" alt="User Image" />
         




            </li>

           
            <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" style="padding-right: 5px;" aria-hidden="true"></i> Dashboard</a></li>

           @if(Auth::user()->hasRole('Administrator'))
           @else
            <li><a href="{{url('/employees/'.Auth::user()->employees->id)}}"><i class="fa fa-file-text-o" style="padding-right: 5px;" aria-hidden="true"></i>My Information</a></li>
              <li><a href="{{url('/payrolls/'.Auth::user()->employees->id)}}"><i class="fa fa-file-text-o" style="padding-right: 5px;" aria-hidden="true"></i> Payslip</a></li>

            <li><a href="{{url('/attendances/'.Auth::user()->employees->id)}}"><i class="fa fa-file-text-o" style="padding-right: 5px;" aria-hidden="true"></i> Time logs</a></li>
           @endif


            @permission('role-create')
            <li><a href="{{url('/announcements')}}"><i class="fa fa-bullhorn" style="padding-right: 5px;" aria-hidden="true"></i> Announcements</a></li>
            @endpermission

            @permission('role-create')
            <li><a href="{{url('/employees')}}"><i class="fa fa-book" style="padding-right: 5px;" aria-hidden="true"></i> Employees</a></li>
            @endpermission

             @permission('role-create')
            <li><a href="{{url('/perdays')}}"><i class="fa fa-book" style="padding-right: 5px;" aria-hidden="true"></i> Per day record </a></li>
            @endpermission

         


            @permission('role-create')
               <li><a href="{{url('/attendances')}}"><i class="fa fa-clock-o" style="padding-right: 5px;" aria-hidden="true"></i> Time Records</a></li>
            <li><a href="{{url('/payrolls')}}"><i class="fa fa-file-text-o" style="padding-right: 5px;" aria-hidden="true"></i> Payslips</a></li>
            <li><a href="{{url('/users')}}"><i class="fa fa-users" style="padding-right: 5px;" aria-hidden="true"></i> Users</a></li>
            @endpermission
            
          </ul>
       
        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        

        @yield('content')

        </div><!-- end col-md-9 -->
      



      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
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


        
  </body>
</html>