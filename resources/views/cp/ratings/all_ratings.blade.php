@extends('indexcp')
@section('all_ratings')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Ratings</h3>
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
                            <th>Rate Level</th>
                            <th>Booking Name</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ratings as $rating)
                        <tr>
                            <th><a href="{{URL::to('/edit/rating/'.$rating->r_id)}}" class="btn btn-info" id=""><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/rating/'.$rating->r_id)}}" class="btn btn-danger" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$rating->r_id}}</th>
                            <th style="background-color:#31b131;">
                                @for($i=0; $i<$rating->r_rate; $i++)
                                <span> <i class="glyphicon glyphicon-star-empty"></i> </span>
                                @endfor
                            </th>
                            <th>{{$rating->b_id}} - {{$rating->b_name}}</th>
                            <th>{{$rating->created_at}}</th>
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