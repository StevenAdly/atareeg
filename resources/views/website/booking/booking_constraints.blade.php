

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

<!-- ============ slider Section  ============= -->
<div id="top" class="starter_container bg">
        <h2 class="top-title" style="margin-top: 80px;"> Atareek</h2>
    <div class="follow_container">
        <h3 style="color:#fff600"> تكلفة الحجز {{$cost}} ريال<br> و يتم استرداد مبلغ التأمين وقيمته 1000 ريال بعد الحفل </h3>
        <div class="col-md-6 col-md-offset-3">
            <hr>
        </div>
    </div>

    @if(session()->has('insert_message'))
        <div class="alert alert-danger">
            <ul>
                {{session()->get('insert_message')}}
            </ul>
        </div>
    @endif

    <div style="margin-top: 90px;">
        <br>
        <h3 style="color:#fff600"> >>> Read these constraints carefully to complete your booking . . . </h3>
        <div class="col-md-6 col-md-offset-3">
        <hr>
        </div>
    </div>

<form method="get" action="{{url('/booking/step3')}}">
    {{ csrf_field() }}
    <div class="col-md-12">
        @foreach($constraints as $c)
            <div class="col-md-12" style="text-align: left; margin-left:20%; margin-right:20%">
                <input style="margin: 0px 9px 0px 9px" type="checkbox" name="{{$c->c_id}}">
                <span style="color:white">{{$c->c_id}} - {{$c->c_constraint}}</span>
            </div>
        @endforeach
    </div>

    <div class="col-md-4 col-md-offset-5">
        <br>
        <button type="submit" id="submit" name="submit" class="form-btn">Accept All</button>
    </div>
</form>

</div>
<!-- ========= End slider Section  ============ -->


<!-- ============ content Section ============= -->
@include('website.parts.content')

<!-- ============ signup Section  ============= -->
@include('website.parts.signup')

<!-- ============ Footer Section  ============= -->
@include('website.parts.footter')

