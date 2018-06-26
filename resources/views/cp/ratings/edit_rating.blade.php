@extends('indexcp')
@section('edit_rating')

    <?php
    $x=Route::input('r_id');
    $ratings=DB::table('ratings')
        ->where('r_id', '=' ,"$x")->get();

    ?>

    @foreach ($ratings as $rating)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Rating: <b style="color:#337ab7;"># {{ Route::input('r_id') }}</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/rating/'.$rating->r_id)}}" >
                        {{csrf_field()}}
                        <div class="">
                            <div class="form-group col-lg-6">
                                <label>Booking Name</label>
                                <select name="book_name" class="form-control select2" style="width: 100%;">
                                    <option value="" disabled>Choose Booking Name</option>
                                    <?php $bookings=DB::table('bookings')
                                        ->where('b_id','=',$rating->book_id)->get(); ?>
                                    @foreach($bookings as $booking)
                                        <option value="{{$booking->b_id}}" {{$booking->b_id == $rating->book_id ? "selected":""}}>
                                            {{$booking->b_id}} - {{$booking->b_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Rate Level</label>
                                    <select name="r_rate" class="form-control select2" style="width: 100%;">
                                        <option value="" disabled >Choose Rate Level</option>
                                        <option value="1" {{$rating->r_rate == 1 ? "selected":""}}> * </option>
                                        <option value="2" {{$rating->r_rate == 2 ? "selected":""}}> * * </option>
                                        <option value="3" {{$rating->r_rate == 3 ? "selected":""}}> * * * </option>
                                        <option value="4" {{$rating->r_rate == 4 ? "selected":""}}> * * * * </option>
                                        <option value="5" {{$rating->r_rate == 5 ? "selected":""}}> * * * * * </option>
                                    </select>
                                </div>
                            </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <button type="submit" class="btn btn-info col-lg-12">Update</button>
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

