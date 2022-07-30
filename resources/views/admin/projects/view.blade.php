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
                    <h3 class="box-title text-center">Edit Project</h3>
                    <p class="text-muted text-center"> Vie/Edit project on form below</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: left;" href="/admin/projects"
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

                            <div class="row mb-5">
                                <div class="container-fluid">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img class="img-rounded img-thumbnail"
                                             src="{{url('storage/projects/'.$project->img_url)}}"
                                        />
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>


                            <form enctype="multipart/form-data" method="POST"
                                  action="/admin/projects/update/{{$project->id}}"
                                  class="form-horizontal form-material">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Image - Thumbnail</label>
                                            <input accept=".png, .jpg, .jpeg" name="img_url" type="file"
                                                   placeholder=""
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Project Type</label>
                                            <select required name="project_type"
                                                    class="form-select shadow-none p-0 border-0 form-control-line">
                                                @if($project->project_type == 'upcoming')
                                                    <option selected value="upcoming">Upcoming</option>
                                                    <option value="ongoing">Ongoing</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="terminated">Terminated</option>
                                                @elseif($project->project_type == 'ongoing')
                                                    <option value="upcoming">Upcoming</option>
                                                    <option selected value="ongoing">Ongoing</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="terminated">Terminated</option>
                                                @elseif($project->project_type == 'completed')
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="ongoing">Ongoing</option>
                                                    <option selected value="completed">Completed</option>
                                                    <option value="terminated">Terminated</option>
                                                @elseif($project->project_type == 'terminated')
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="ongoing">Ongoing</option>
                                                    <option value="completed">Completed</option>
                                                    <option selected value="terminated">Terminated</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Project Name</label>
                                            <input value="{{$project->project_name}}" required name="project_name"
                                                   type="text"
                                                   placeholder="Ex: Construction of school house"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Project Period</label>
                                            <input value="{{$project->project_period}}" required name="project_period"
                                                   type="text"
                                                   placeholder="Ex: 10 Jan 2021 - 20 Feb 2022"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Document - Project
                                                File <?php $file = !empty($project->project_file) ? '<a class="btn btn-sm btn-primary mx-2" target="_blank" href="' . url('storage/projects/' . $project->project_file) . '">View File</a>' : ''; echo $file; ?></label>
                                            <input accept="application/pdf" name="project_file" type="file"
                                                   placeholder=""
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Budgeted Amount($)</label>
                                            <input value="{{$project->budgeted_amount}}" required name="budgeted_amount"
                                                   type="text" placeholder="Ex: 2000"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Amount Raised($)</label>
                                            <input value="{{$project->amount_raised}}" required name="amount_raised"
                                                   type="text"
                                                   placeholder="Ex: 1200"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Project Summary</label>
                                            <textarea name="project_summary"
                                                      placeholder="Description of the project"
                                                      class="form-control p-0 border-0">
                                                {{$project->project_summary}}
                                            </textarea>
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
