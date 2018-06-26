@extends('indexcp')
@section('add_block')

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New Block Time</h3>

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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/add/new/block')}}" >
                    {{csrf_field()}}
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="bl_name" required class="form-control" placeholder="Enter Block Time Name">
                                    </div>
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input name="bl_started_at" required class="form-control" placeholder="Enter Block Start Time">
                                </div>
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input name="bl_ended_at" required class="form-control" placeholder="Enter Block End Time">
                                </div>
                                <div class="form-group">
                                    <label>Price/person</label>
                                    <input name="bl_price" required class="form-control" placeholder="Enter Block Time Price">
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

