@extends('indexcp')
@section('edit_booking')

    <?php
    $x=Route::input('b_id');
    $bookings=DB::table('bookings')
        ->where('b_id', '=' ,"$x")->get();

    ?>

    @foreach ($bookings as $bo)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Booking: <b style="color:#337ab7;"># {{ Route::input('b_id') }}</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/booking/'.$bo->b_id)}}" >
                        {{csrf_field()}}
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Booking Name</label>
                                        <input name="b_name" value="{{$bo->b_name}}" required class="form-control" placeholder="Enter Booking Name">
                                    </div>
                                    <div class="form-group">
                                        <label>How many guests ?</label>
                                        <input name="b_num_of_guests" value="{{$bo->b_num_of_guests}}" type="number" required class="form-control" placeholder="Enter number of Guests">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Booking Payment Way</label>
                                        <select name="b_payment_way" class="form-control select2" style="width: 100%;">
                                            <option value="" disabled>Choose Payment Way</option>
                                            <option value="cash" {{$bo->b_payment_way == "cash" ? "selected" :""}} >Cash</option>
                                            <option value="bank" {{$bo->b_payment_way == "bank" ? "selected" :""}} >Bank</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Payment Receipt</label>
                                        <input name="b_payment_receipt" value="{{$bo->b_payment_receipt}}" class="form-control" placeholder="Enter Payment Reciept">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Booking Status</label>
                                        <select name="b_status" class="form-control select2" style="width: 100%;">
                                            <option value="" disabled>Choose Booking Status</option>
                                            <option value="pending" {{$bo->b_status == "pending" ? "selected" :""}} >Pending</option>
                                            <option value="cancelled" {{$bo->b_status == "cancelled" ? "selected" :""}} >Cancelled</option>
                                            <option value="booked" {{$bo->b_status == "booked" ? "selected" :""}} >Booked</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Booking Date: </label>
                                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input name="b_date" value="{{$bo->b_date}}" class="form-control" type="text" readonly />
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group col-md-6">
                                            <label>Block Time Name</label>
                                            <select name="bl_name" class="form-control select2" style="width: 100%;">
                                                <option value="" disabled selected>Choose Block Time Name</option>
                                                <?php $blocks=DB::table('blocks')->get(); ?>
                                                @foreach($blocks as $block)
                                                    <option value="{{$block->bl_id}}" {{$bo->block_id== $block->bl_id ? "selected" :""}} > {{$block->bl_name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>User Name</label>
                                            <select name="user_name" class="form-control select2" style="width: 100%;">
                                                <option value="" disabled selected>Choose User Name</option>
                                                <?php $users=DB::table('users')->get(); ?>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}"  {{$bo->user_id== $user->id ? "selected" :""}}  > {{$user->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="checkbox" name="b_belela" value="1" {{$bo->b_belela == 1? "checked":""}}>
                                            <label>Add Belela</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="checkbox" name="b_deafa" value="1" {{$bo->b_deafa == 1? "checked":""}}>
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

    @endforeach


@endsection

