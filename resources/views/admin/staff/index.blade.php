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
                    <h3 class="box-title text-center">All Staff</h3>
                    <p class="text-muted text-center"> List of org. staff </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/staff/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Staff Member
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($staff_members) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Title</b></th>
                                    <th class="border-top-0"><b>Position</b></th>
                                    <th class="border-top-0"><b>Staff Name</b></th>
                                    <th class="border-top-0"><b>Staff Email</b></th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($staff_members as $staff )
                                    <tr>
                                        <td><img class="img-rounded img-thumbnail"
                                                 src="{{url('storage/staff/'.$staff->img_url)}}"
                                                 height="50" width="80"/></td>
                                        <td>{{ \Illuminate\Support\Str::of( $staff->title)->words(10,'...')}}  </td>
                                        <td>{{ \Illuminate\Support\Str::of( $staff->position)->words(10,'...')}}  </td>
                                        <td>{{ \Illuminate\Support\Str::of( $staff->staff_name)->words(10,'...')}}  </td>
                                        <td>{{ \Illuminate\Support\Str::of( $staff->staff_email)->words(10,'...')}}  </td>
                                        </td>
                                        <td>


                                            <form action="/admin/staff/delete/{{$staff->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/staff/edit/{{$staff->id}}"
                                                   class="btn btn-sm btn-primary mx-2">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <button class="btn btn-sm btn-primary mx-2">
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
                            <p class="text-center text-danger alert alert-danger">No staff added yet!</p>
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
