@extends('indexcp')
@section('add_user')

    <head>

        <style>
            body{
                background-color: #525252;
            }
            .centered-form{
                margin-top: 60px;
            }

            .centered-form .panel{
                background: rgba(255, 255, 255, 0.8);
                box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
            }
        </style>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New User</h3>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('insert_message'))
                            <hr>
                            <div class="alert alert-danger">
                                <ul>
                            {{session()->get('insert_message')}}
                                </ul>
                            </div>
                            <hr>
                        @endif


                    </div>

                    <div class="panel-body">
                        <div class="row centered-form">
                            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Please, Type your data here <small>It's free!</small></h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="post" action="{{url('/add/new/user')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="name" required id="name" class="form-control input-sm" placeholder="Name">
                                            </div>

                                            <div class="form-group">
                                                <input type="email" name="email" required id="email" class="form-control input-sm" placeholder="Email Address">
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" name="password" required id="password" class="form-control input-sm" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" name="c_password" required id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="phone1" required class="form-control input-sm" placeholder="Phone Numer">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="phone2" required class="form-control input-sm" placeholder="Another Phone Numer">
                                            </div>

                                            <input type="submit" value="Add User" class="btn btn-success btn-block">
                                            <br>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@endsection

