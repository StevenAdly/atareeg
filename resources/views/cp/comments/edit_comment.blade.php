@extends('indexcp')
@section('edit_comment')

    <?php
    $x=Route::input('com_id');
    $comments=DB::table('comments')
        ->where('com_id', '=' ,"$x")->get();

    ?>

    @foreach ($comments as $comment)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Comment: <b style="color:#337ab7;"># {{ Route::input('com_id') }}</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/comment/'.$comment->com_id)}}" >
                        {{csrf_field()}}
                        <div class="">
                            <div class="form-group col-lg-6">
                                <label>Booking Name</label>
                                <select name="book_name" class="form-control select2" style="width: 100%;">
                                    <option value="" disabled>Choose Booking Name</option>
                                    <?php $bookings=DB::table('bookings')
                                        ->where('b_id','=',$comment->book_id)->get(); ?>
                                    @foreach($bookings as $booking)
                                        <option value="{{$booking->b_id}}" {{$booking->b_id == $comment->book_id ? "selected":""}}>
                                            {{$booking->b_id}} - {{$booking->b_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="com_comment" class="form-control" rows="5" placeholder="Enter Constraint" required>{{$comment->com_comment}}
                                    </textarea>
                                </div>
                            </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <button type="submit" class="btn btn-info col-lg-12">Update</button>
                            <!-- /.row (nested) -->

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

