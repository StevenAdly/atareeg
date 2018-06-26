@extends('indexcp')
@section('all_bookings')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Bookings</h3>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>E</th>
                            <th>D</th>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Book Date</th>
                            <th>Booking ID Generator</th>
                            <th>Cost</th>
                            <th># Guests</th>
                            <th>Belela</th>
                            <th>Deafa Trasea 7gazea</th>
                            <th>Pay Way</th>
                            <th>Pay Receipt</th>
                            <th>Status</th>
                            <th>Block Name</th>
                            <th>User Name</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                        <tr {{($booking->b_name == "xxxxx")?"class=hidden":""}}>
                            <th><a href="{{URL::to('/edit/booking/'.$booking->b_id)}}" class="btn btn-info" style="padding: 1px 3px;"><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/booking/'.$booking->b_id)}}" class="btn btn-danger" style="padding: 1px 3px;" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$booking->b_id}}</th>
                            <th>{{$booking->b_name}}</th>
                            <th>{{$booking->b_date}}</th>
                            <th>{{$booking->b_id_generator}}</th>
                            <th>{{$booking->b_cost}}</th>
                            <th>{{$booking->b_num_of_guests}}</th>
                            <th>{{$booking->b_belela == 1 ? "YES":"NO"}}</th>
                            <th>{{$booking->b_deafa == 1 ? "YES":"NO"}}</th>
                            <th>{{$booking->b_payment_way}}</th>
                            <th>{{$booking->b_payment_receipt}}</th>
                            <th style="background-color: {{ ($booking->b_status == "pending") ? "#eb9316" : (($booking->b_status == "cancelled") ? "#c12e2a" : "#419641" ) }}">{{$booking->b_status}}</th>
                            <th>{{$booking->bl_name}}</th>
                            <th>{{$booking->name}}</th>
                            <th>{{$booking->created_at}}</th>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-4 (nested) -->

    </div>
</div>
@endsection