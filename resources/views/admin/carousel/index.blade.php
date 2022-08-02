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
                    <h3 class="box-title text-center">All Items in Carousel</h3>
                    <p class="text-muted text-center"> Items in Carousel </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/carousel/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add Carousel Item
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($carousel) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Title</b></th>
                                    <th class="border-top-0"><b>Subtitle</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($carousel as $item )
                                    <tr>
                                        <td><img class="img-rounded "
                                                 src="{{url('storage/carousel/'.$item->img_url)}}"
                                                 height="50" width="80"/></td>
                                        <td>{{ \Illuminate\Support\Str::of( $item->title)->words(5,'...')}}</td>
                                        <td>{{ \Illuminate\Support\Str::of( $item->subtitle)->words(7,'...')}}</td>
                                        <td>
                                            <form action="/admin/carousel/delete/{{$item->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/carousel/edit/{{$item->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No Images added to your carousel
                                yet!</p>
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
