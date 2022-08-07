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
                    <h3 class="box-title text-center">All Vacancies</h3>
                    <p class="text-muted text-center"> List of org. vacancies </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/vacancies/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Project
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($vacancies) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b>Title</b></th>
                                    <th class="border-top-0"><b>Dateline</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($vacancies as $vacancy )
                                    <tr>

                                        <td>{{ \Illuminate\Support\Str::of( $vacancy->title)->words(5,'...')}}</td>
                                        <td>{{$vacancy->dateline}}</td>
                                        <td>
                                            <form action="/admin/vacancies/delete/{{$vacancy->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/vacancies/edit/{{$vacancy->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No vacancies added yet!</p>
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
