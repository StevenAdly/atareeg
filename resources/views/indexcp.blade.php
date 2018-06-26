<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atareek</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('adminp/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('adminp/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('adminp/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{URL::to('adminp/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('adminp/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color:#337ab7;font-size: x-large;" class="navbar-brand" href="{{URL::to('/cp')}}">
                    <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Atareek
                    </b>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                        $admins = DB::table('admins')->where('a_email','=',Session::get('a_email'))->get();
                        ?>
                        @foreach($admins as $admin)
                        <li>
                            <a href=""><i class="fa fa-user fa-fw"></i> {{$admin->a_name}}</a>
                        </li>
                        @endforeach
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{URL::to('/cp')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('all/users')}}">All Users</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('add/user')}}">Add New User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Time Blocks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('all/blocks')}}">All Time Blocks</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('add/block')}}">Add New Block Time</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Bookings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('/all/bookings')}}">All Bookings</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/add/booking')}}">Add New Booking</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Rattings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('/all/ratings')}}">All Rattings</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/add/rating')}}">Add New Ratting</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Comments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('/all/comments')}}">All Comments</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/add/comment')}}">Add New Comment</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Constraints<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('all/constraints')}}">All Constraints</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/add/constraint')}}">Add New Constraint</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


@yield('content')

@yield('add_user')
@yield('edit_user')
@yield('all_users')

@yield('add_booking')
@yield('edit_booking')
@yield('all_bookings')

@yield('add_rating')
@yield('edit_rating')
@yield('all_ratings')

@yield('add_comment')
@yield('edit_comment')
@yield('all_comments')

@yield('add_block')
@yield('edit_block')
@yield('all_blocks')

@yield('add_constraint')
@yield('edit_constraint')
@yield('all_constraints')


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{URL::to('adminp/vendor/jquery/jquery.min.js')}}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('adminp/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::to('adminp/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{URL::to('adminp/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::to('adminp/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{URL::to('adminp/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('adminp/dist/js/sb-admin-2.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript">

        $(document).on('click','#deletes',function (e) {
            e.preventDefault();
            var link = $(this).attr('href');

            bootbox.confirm(' Are you  sure to delete this record ?'  ,function (confirmed) {

                if(confirmed) {
                    window.location.href = link;
                }
            });
        });
    </script>

    <!-- **************** -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script>$(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
                format : 'yyyy-mm-dd'
            }).datepicker('update');
        });
    </script>

</body>

</html>
