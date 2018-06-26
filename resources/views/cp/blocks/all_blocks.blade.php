@extends('indexcp')
@section('all_blocks')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Time Blocks</h3>
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
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Price/person</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                        <tr>
                            <th><a href="{{URL::to('/edit/block/'.$block->bl_id)}}" class="btn btn-info" id=""><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/block/'.$block->bl_id)}}" class="btn btn-danger" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$block->bl_id}}</th>
                            <th>{{$block->bl_name}}</th>
                            <th>{{$block->bl_started_at}}</th>
                            <th>{{$block->bl_ended_at}}</th>
                            <th>{{$block->bl_price}}</th>
                            <th>{{$block->created_at}}</th>
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