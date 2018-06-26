@extends('indexcp')
@section('edit_user')

    <?php
    $x=Route::input('id');
    $users=DB::table('users')
        ->where('id', '=' ,"$x")->get();
    ?>

    @foreach ($users as $user)

    <div id="page-wrapper">
        <br>

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

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit User: <b style="color:#337ab7;"># {{ Route::input('id') }}</b></h3>


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
                                        <form role="form" method="post" action="{{url('/update/user/'.$user->id)}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="name" value="{{$user->name}}" required id="name" class="form-control input-sm" placeholder="Name">
                                            </div>

                                            <div class="form-group">
                                                <input type="email" name="email" value="{{$user->email}}" required id="email" class="form-control input-sm" placeholder="Email Address">
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="phone1" value="{{$user->phone1}}" required class="form-control input-sm" placeholder="Phone Numer">
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="phone2" value="{{$user->phone2}}" required class="form-control input-sm" placeholder="Another Phone Numer">
                                            </div>

                                            <input type="submit" value="Update" class="btn btn-info btn-block">


                                        </form>
                                    </div>
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

    @endforeach


@endsection

