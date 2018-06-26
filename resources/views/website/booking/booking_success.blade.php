

<!-- ============ header Section  ============= -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Atareek</title>
    <link rel="stylesheet" href="{{URL::to('website/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::to('website/css/main.css')}}" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{URL::to('website/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('website/css/style-portfolio.css')}}">
    <link rel="stylesheet" href="{{URL::to('website/css/picto-foundry-food.css')}}" />
    <link rel="stylesheet" href="{{URL::to('website/css/jquery-ui.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::to('website/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{URL::to('website/favicon-1.ico')}}" type="image/x-icon">



    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- styles for datepicker -->
    <style>
        #datepicker > span:hover{cursor: pointer;}
    </style>



</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/')}}">Atareek</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav main-nav  clear navbar-right ">
                    <li><a class="navactive color_animation" href="{{URL::to('/new/booking')}}">New Booking</a></li>
                    <li><a class="color_animation" href="#story">ABOUT</a></li>
                    <li><a class="color_animation" href="#pricing">PRICING</a></li>
                    <li><a class="color_animation" href="#beer">BEER</a></li>
                    <li><a class="color_animation" href="#bread">BREAD</a></li>
                    <li><a class="color_animation" href="#featured">FEATURED</a></li>
                    <li><a class="color_animation" href="#reservation">RESERVATION</a></li>
                    <li><a class="color_animation" href="#contact">CONTACT</a></li>
                    <li><a class="color_animation" href="{{URL::to('/logout/user')}}">Sign out</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container-fluid -->
</nav>

<?php
$users = DB::table('users')->where('email','=',Session::get('email'))->get();
?>

<div id="top" class="starter_container bg">
    <div class="follow_container">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="top-title" style="margin-top: -130px;"> Atareek</h2>
            @foreach($users as $user)
                <h2 class="white second-title"> Congratulations <span style="color: #F79300;">{{$user->name}}</span></h2>
            @endforeach
            <hr>




            <!-- ============  booking Success  ============= -->

            <span style="color: red;font-size: xx-large;"><b>Success . . .</b></span> <br>
            <h3 style="color: red;">
                Your Booking ID :    <br><br>
                <b>{{$b_id_generator}}</b>
            </h3>





        </div>
    </div>
</div>

<!-- ============ header Section  ============= -->
@include('website.parts.content')

<!-- ============ Footer Section  ============= -->

@include('website.parts.footter')


<script type="text/javascript" src="{{URL::to('website/js/jquery-1.10.2.min.js')}}"> </script>
<script type="text/javascript" src="{{URL::to('website/js/bootstrap.min.js')}}" ></script>
<script type="text/javascript" src="{{URL::to('website/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{URL::to('website/js/jquery.mixitup.min.js')}}" ></script>
<script type="text/javascript" src="{{URL::to('website/js/main.js')}}" ></script>

<!-- **************** -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>$(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true,
            format : 'dd/mm/yyyy'
        }).datepicker('update');
    });
</script>

</body>
</html>