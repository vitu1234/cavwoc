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
                    <h3 class="box-title text-center">All What Others Say</h3>
                    <p class="text-muted text-center"> List of org. what others say </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/others_say/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add What Others Say
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($others_say) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Fullname</b></th>
                                    <th class="border-top-0"><b>Profession</b></th>
                                    <th class="border-top-0"><b>What They Say</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($others_say as $say )
                                    <tr>
                                        <td><img class="img-rounded "
                                                 src="{{url('storage/others_say/'.$say->profile_picture)}}"
                                                 height="50" width="80"/></td>

                                        <td>{{ \Illuminate\Support\Str::of( $say->fullname)->limit(40,'...')}}</td>
                                        <td>{{ \Illuminate\Support\Str::of( $say->profession)->limit(40,'...')}}</td>
                                        <td>{{ \Illuminate\Support\Str::of( $say->what_they_say)->words(6,'...')}}</td>
                                        <td>{{$say->created_at}}</td>

                                        </td>
                                        <td>


                                            <form action="/admin/others_say/delete/{{$say->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/others_say/edit/{{$say->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No - What others say - added yet!</p>
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
