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

     <!-- select 2 -->
    <link href="{{asset('/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/radio.css')}}" rel="stylesheet" />

    <!-- Styles -->
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

    </style>
    <script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date()
var x1=x.toDateString(); 
x1 = x1 + "  " + x.getHours( )+ ":" + x.getMinutes() + ":" + x.getSeconds();
document.getElementById('ct').innerHTML = x1;
document.getElementById('ct').style.fontSize='30px';
document.getElementById('ct').style.color='#0030c0';
document.getElementById('ct').innerHTML = x1;

tt=display_c();
}

</script>
</head>
<body onload=display_ct(); id="app-layout">


    <div class="container">
   
                    @yield('content')
     
</div>







   









    <!-- JavaScripts -->
     <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
           <!-- select2 js plugin -->
    <script src="{{asset('js/select2.min.js')}}"></script>

    
    <!-- select2 plugin -->
    <script>
      $(".select2").select2({
       placeholder: "Select an Employee Id",
       allowClear: true
        });
    </script>

      <script>
      $(".select3").select2({
       placeholder: "Select an employee time out",
       allowClear: true
        });
    </script>


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

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
