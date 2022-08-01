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
                    <h3 class="box-title text-center">Add Users</h3>
                    <p class="text-muted text-center"> Add a system admin below</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: left;" href="/admin/users"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-arrow-left mx-2"></span> Back
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">


                            @if(Session::has('success'))
                                <div class="alert alert-success text-center" style="width: 100%;">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger text-center" style="width: 100%;">
                                    {{ Session::get('error') }}
                                    @php
                                        Session::forget('error');
                                    @endphp
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger text-center" style="width: 100%;">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="/admin/users/store" class="form-horizontal form-material">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">First Name</label>
                                            <input required name="first_name" type="text" placeholder="Johnathan"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Last Name</label>
                                            <input required name="last_name" type="text" placeholder="Doe"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Email</label>
                                            <input required name="email" type="email" placeholder="email@example.com"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Phone</label>
                                            <input required name="phone" type="text" placeholder="+265XXXXXXXXX"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Password</label>
                                            <input required name="password" type="password" placeholder="Password"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Confirm Password</label>
                                            <input required name="password_confirmation" type="password"
                                                   placeholder="Confirm Password"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-success">Save User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
