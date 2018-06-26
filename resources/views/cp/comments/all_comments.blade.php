@extends('indexcp')
@section('all_comments')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Comments</h3>
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
                            <th>Comment</th>
                            <th>Booking Name</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <th><a href="{{URL::to('/edit/comment/'.$comment->com_id)}}" class="btn btn-info" id=""><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/comment/'.$comment->com_id)}}" class="btn btn-danger" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$comment->com_id}}</th>
                            <th>{{$comment->com_comment}}</th>
                            <th>{{$comment->b_id}} - {{$comment->b_name}}</th>
                            <th>{{$comment->created_at}}</th>
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