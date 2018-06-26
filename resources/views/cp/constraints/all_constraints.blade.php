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
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($constraints as $constraint)
                        <tr>
                            <th><a href="{{URL::to('/edit/constraint/'.$constraint->c_id)}}" class="btn btn-info" id=""><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/constraint/'.$constraint->c_id)}}" class="btn btn-danger" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$constraint->c_id}}</th>
                            <th>{{$constraint->c_constraint}}</th>
                            <th>{{$constraint->created_at}}</th>
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