@extends('indexcp')
@section('edit_block')

    <?php
    $x=Route::input('bl_id');
    $blocks=DB::table('blocks')
        ->where('bl_id', '=' ,"$x")->get();

    ?>

    @foreach ($blocks as $b)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Time Block: <b style="color:#337ab7;"># {{ Route::input('bl_id') }}</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/block/'.$b->bl_id)}}" >
                        {{csrf_field()}}
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="bl_name" required value="{{$b->bl_name}}" class="form-control" placeholder="Enter Block Time Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input name="bl_started_at" required value="{{$b->bl_started_at}}" class="form-control" placeholder="Enter Block Start Time">
                                    </div>
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input name="bl_ended_at" required value="{{$b->bl_ended_at}}" class="form-control" placeholder="Enter Block End Time">
                                    </div>
                                    <div class="form-group">
                                        <label>Price/person</label>
                                        <input name="bl_price" required value="{{$b->bl_price}}" class="form-control" placeholder="Enter Block End Time">
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

