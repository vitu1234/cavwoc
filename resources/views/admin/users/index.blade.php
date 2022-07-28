@extends('admin.layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title text-center">All Users</h3>
                    <p class="text-muted text-center"> List of system admins</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/users/showaddform"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add User
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($users) > 0)
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Full name</th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Account Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($users as $user )
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{!!  $user->account_status == 1? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>' !!}</td>
                                        <td>
                                            <a href="/admin/user/view/{{$user->id}}"
                                               class="btn btn-sm btn-primary mx-2">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="/admin/user/delete/{{$user->id}}"
                                               class="btn btn-sm btn-primary mx-2">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $count++?>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-danger alert alert-danger">No users added yet!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection
