@extends('indexcp')
@section('add_rating')

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New Ratting</h3>

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
                            {{session()->get('insert_message')}}
                            <hr>
                        @endif


                    </div>

                    <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/add/new/rating')}}" >
                    {{csrf_field()}}
                    <div class="">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Booking Name</label>
                                <select name="book_name" class="form-control select2" style="width: 100%;">
                                    <option value="" disabled selected>Choose Booking Name</option>
                                    <?php $bookings=DB::table('bookings')->where('deleted_at','=',NULL)->get(); ?>
                                    @foreach($bookings as $booking)
                                        <option value="{{$booking->b_id}}">{{$booking->b_id}} - {{$booking->b_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Rate Level</label>
                                    <select name="r_rate" class="form-control select2" style="width: 100%;">
                                        <option value="" disabled selected>Choose Rate Level</option>
                                        <option value="1"> * </option>
                                        <option value="2"> * * </option>
                                        <option value="3"> * * * </option>
                                        <option value="4"> * * * * </option>
                                        <option value="5"> * * * * * </option>
                                    </select>
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

