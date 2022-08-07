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
                    <h3 class="box-title text-center">Add Donation Project</h3>
                    <p class="text-muted text-center"> Add project on form below</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: left;" href="/admin/donations"
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

                            <form enctype="multipart/form-data" method="POST" action="/admin/donations/store"
                                  class="form-horizontal form-material">
                                @csrf


                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Image - Thumbnail</b></label>
                                            <input
                                                onclick="alert('Make sure the picture is 600x400 otherwise, website will be distorted!')"
                                                 accept=".png, .jpg, .jpeg" name="img_url" type="file"
                                                placeholder=""
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Project Name</b></label>
                                            <input required name="project_name" type="text"
                                                   placeholder="Ex: Construction of school house"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Budgeted Amount($)</b></label>
                                            <input required name="budgeted_amount" type="text" placeholder="Ex: 2000"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Amount Raised($)</b></label>
                                            <input required name="amount_raised" type="text"
                                                   placeholder="Ex: 1200"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Project Summary</b></label>
                                            <textarea name="project_summary"
                                                      placeholder="Description of the project"
                                                      class="form-control p-0 border-0"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0"><b>Project Context</b></label>
                                            <textarea required rows="7" name="project_context"
                                                      placeholder="Project Context"
                                                      class="form-control p-0 border-0 textarea_"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-success">Save Project</button>
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
