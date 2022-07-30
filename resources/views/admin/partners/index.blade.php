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
                    <h3 class="box-title text-center">All Partners</h3>
                    <p class="text-muted text-center"> List of org. partners </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/partners/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Partner
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($partners) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Link</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($partners as $partner )
                                    <tr>
                                        <td><img class="img-rounded img-thumbnail"
                                                 src="{{url('storage/partners/'.$partner->img_url)}}"
                                                 height="50" width="80"/></td>

                                        <td>{{ \Illuminate\Support\Str::of( $partner->link)->limit(40,'...')}}</td>
                                        <td>{{$partner->created_at}}</td>

                                        </td>
                                        <td>


                                            <form action="/admin/partners/delete/{{$partner->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/partners/edit/{{$partner->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No Partners added yet!</p>
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
