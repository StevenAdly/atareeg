@extends('indexcp')
@section('add_booking')

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New Booking</h3>

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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/add/new/booking')}}" >
                    {{csrf_field()}}
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Booking Name</label>
                                        <input name="b_name" required class="form-control" placeholder="Enter Booking Name">
                                        </div>
                                    <div class="form-group">
                                        <label>How many guests ?</label>
                                        <input name="b_num_of_guests" type="number" required class="form-control" placeholder="Enter number of Guests">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Booking Payment Way</label>
                                        <select name="b_payment_way" class="form-control select2" style="width: 100%;">
                                            <option value="" disabled selected>Choose Payment Way</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Booking Date: </label>
                                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input name="b_date" class="form-control" type="text" readonly  placeholder="Enter Booking Date" />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="form-group col-md-6">
                                        <label>Block Time Name</label>
                                        <select name="bl_name" class="form-control select2" style="width: 100%;">
                                            <option value="" disabled selected>Choose Block Time Name</option>
                                            <?php $blocks=DB::table('blocks')->where('deleted_at','=',NULL)->get(); ?>
                                            @foreach($blocks as $block)
                                                <option value="{{$block->bl_id}}"> {{$block->bl_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>User Name</label>
                                        <select name="user_name" class="form-control select2" style="width: 100%;">
                                            <option value="" disabled selected>Choose User Name</option>
                                            <?php $users=DB::table('users')->where('deleted_at','=',NULL)->get(); ?>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}"> {{$user->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="checkbox" name="b_belela" value="1">
                                        <label>Add Belela</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="checkbox" name="b_deafa" value="1">
                                        <label>Add El Deafa EL Trasa El 7egazea</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                        </div>
                        <button type="submit" class="btn btn-success col-lg-12">Save</button>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                    </form>
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

