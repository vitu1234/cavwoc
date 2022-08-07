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
                    <h3 class="box-title text-center">All Donation Projects</h3>
                    <p class="text-muted text-center"> List of org. donations </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/donations/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Project
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($donations) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Project Name</b></th>
                                    <th class="border-top-0"><b>Project Description</b></th>
                                    <th class="border-top-0"><b>Project Budget</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($donations as $project )
                                    <tr>
                                        <td><img class="img-rounded "
                                                 src="{{url('storage/donations/'.$project->img_url)}}"
                                                 height="50" width="80"/></td>
                                        <td>{{ \Illuminate\Support\Str::of( $project->project_name)->words(5,'...')}}</td>
                                        <td>{{ \Illuminate\Support\Str::of( $project->project_summary)->words(5,'...')}}</td>
                                        <td class="text-center">$ {{number_format($project->budgeted_amount)}}

                                        </td>
                                        <td>


                                            <form action="/admin/donations/delete/{{$project->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/donations/edit/{{$project->id}}"
                                                   class="btn btn-sm btn-primary mx-2">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <button class="btn btn-sm btn-danger text-light mx-2">
                                                    <span class="fa fa-trash"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $count++?>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-danger alert alert-danger">No donations added yet!</p>
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
