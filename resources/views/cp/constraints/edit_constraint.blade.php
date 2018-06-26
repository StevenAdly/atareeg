@extends('indexcp')
@section('edit_constraint')

    <?php
    $x=Route::input('c_id');
    $constraints=DB::table('constraints')
        ->where('c_id', '=' ,"$x")->get();

    ?>

    @foreach ($constraints as $c)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Constraint: <b style="color:#337ab7;"># {{ Route::input('c_id') }}</b></h3>


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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update/constraint/'.$c->c_id)}}" >
                        {{csrf_field()}}
                        <div class="">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Constraint</label>
                                    <textarea name="c_constraint" class="form-control" rows="5" placeholder="Enter Constraint">{{$c->c_constraint}}</textarea>
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

