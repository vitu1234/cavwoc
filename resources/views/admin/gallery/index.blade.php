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
                    <h3 class="box-title text-center">All Images in Gallery</h3>
                    <p class="text-muted text-center"> List of org. all images in your gallery </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/gallery/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Image to gallery
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($gallery) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b>Image</b></th>
                                    <th class="border-top-0"><b>Created at</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($gallery as $img )
                                    <tr>
                                        <td><img class="img-rounded img-thumbnail"
                                                 src="{{url('storage/gallery/'.$img->img_url)}}"
                                                 height="50" width="80"/></td>

                                        <td>{{$img->created_at}}</td>

                                        </td>
                                        <td>


                                            <form action="/admin/gallery/delete/{{$img->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/gallery/edit/{{$img->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No Images added to your gallery added yet!</p>
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
