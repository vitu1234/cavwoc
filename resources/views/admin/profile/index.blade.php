@extends('admin.layouts.app')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg"><img width="100%" alt="user" src="{{asset('images/blank_pic.png')}}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="{{asset('images/blank_pic.png')}}"
                                                                  class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white mt-2">{{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->surname    }}</h4>
                                <h5 class="text-white mt-2">{{\Illuminate\Support\Facades\Auth::user()->email}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <div class="col-md-4 col-sm-12 text-center">
                            <h1> {{\Illuminate\Support\Facades\Auth::user()->phone}}</h1>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="p-3">
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
                        </div>
                        <form class="form-horizontal form-material" method="POST" action="/admin/users/update/{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">First Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}" required
                                           name="first_name" type="text" placeholder="Ex: Johnathan"
                                           class="form-control p-0 border-0"></div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Last Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}" required
                                           name="last_name" type="text" placeholder="Ex: Doe"
                                           class="form-control p-0 border-0"></div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Phone </label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input name="phone" required
                                           value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" type="text"
                                           placeholder="123 456 7890"
                                           class="form-control p-0 border-0"/>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input required value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                           type="email" placeholder="johnathan@admin.com"
                                           class="form-control p-0 border-0" name="email"
                                           id="example-email">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Password</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" placeholder="Input New Password to change current password" class="form-control p-0 border-0">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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
