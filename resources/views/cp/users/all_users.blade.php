@extends('indexcp')
@section('all_users')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Users</h3>
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
                            <th>Email</th>
                            <th>Phone Number 1</th>
                            <th>Phone Number 2</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th><a href="{{URL::to('/edit/user/'.$user->id)}}" class="btn btn-info" id=""><i class="glyphicon glyphicon-edit"></i></a></th>
                            <th><a href="{{URL::to('/delete/user/'.$user->id)}}" class="btn btn-danger" id="deletes"><i class="glyphicon glyphicon-trash"></i></a></th>
                            <th>{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->phone1}}</th>
                            <th>{{$user->phone2}}</th>
                            <th>{{$user->created_at}}</th>
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