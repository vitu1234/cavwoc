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
                    <h3 class="box-title text-center">All Annual Reports</h3>
                    <p class="text-muted text-center"> List of org. Annual Reports </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/annual_reports/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Annual Report
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($annual_reports) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b>Title</b></th>
                                    <th class="border-top-0"><b>Description</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($annual_reports as $report )
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::of( $report->title)->words(7,'...')}}<a class="btn btn-sm btn-primary mx-2"
                                                                                                                target="_blank"
                                                                                                                href="{{url('storage/annual_reports/' . $report->report_url) }}">Attached
                                                File</a></td>
                                        <td>{{ \Illuminate\Support\Str::of( $report->description)->words(7,'...')}}</td>
                                        </td>
                                        <td>
                                            <form action="/admin/annual_reports/delete/{{$report->id}}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <a href="/admin/annual_reports/edit/{{$report->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No annual reports added yet!</p>
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
