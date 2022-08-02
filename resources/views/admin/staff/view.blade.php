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
                    <h3 class="box-title text-center">Edit Staff Member</h3>
                    <p class="text-muted text-center"> Edit staff member on form below</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: left;" href="/admin/staff"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-arrow-left mx-2"></span> Back
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-  body">


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

                            <div class="row mb-5">
                                <div class="container-fluid">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img class="img-rounded img-thumbnail"
                                             src="{{url('storage/staff/'.$staff->img_url)}}"
                                        />
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>


                            <form enctype="multipart/form-data" method="POST"
                                  action="/admin/staff/update/{{$staff->id}}"
                                  class="form-horizontal form-material">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Image - Profile Picture</label>
                                            <input accept=".png, .jpg, .jpeg" name="img_url" type="file"
                                                   placeholder=""
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Title</label>
                                            <select required name="title"
                                                    class="form-select shadow-none p-0 border-0 form-control-line">

                                                <option {{$staff->title=='Mr'? 'selected':''}} value="Mr">Mr</option>
                                                <option {{$staff->title=='Mrs'? 'selected':''}} value="Mrs">
                                                    Mrs
                                                </option>
                                                <option {{$staff->title=='Dr'? 'selected':''}} value="Dr">Dr</option>
                                                <option {{$staff->title=='Hon'? 'selected':''}} value="Hon">Hon</option>
                                                <option {{$staff->title=='Prof'? 'selected':''}} value="Prof">Prof
                                                </option>
                                                <option {{$staff->title=='Sr'? 'selected':''}} value="Sr">Sr</option>
                                                <option {{$staff->title=='Miss'? 'selected':''}} value="Miss">Miss
                                                </option>
                                                <option {{$staff->title=='Rev'? 'selected':''}} value="Rev">Rev</option>
                                                <option {{$staff->title=='Ms'? 'selected':''}} value="Ms">Ms</option>
                                            </select>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Staff Position</label>
                                            <input value="{{$staff->position}}" required name="position"
                                                   type="text"
                                                   placeholder="Ex: IT Officer"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Staff Name</label>
                                            <input value="{{$staff->staff_name}}" required name="staff_name"
                                                   type="text"
                                                   placeholder="Ex: John Doe"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Staff Phone</label>
                                            <input value="{{$staff->staff_phone}}" name="staff_phone"
                                                   type="tel"
                                                   placeholder="Ex: +26599XXXXXXX"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Staff Email</label>
                                            <input value="{{$staff->staff_email}}" name="staff_email"
                                                   type="text"
                                                   placeholder="Ex: mail@example.com"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Staff Bio</label>
                                            <textarea required name="staff_bio"
                                                      placeholder="Ex: This is the bibliography of the person"
                                                      class="form-control p-0 border-0">{{$staff->staff_bio}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-success">Save Staff Member</button>
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
