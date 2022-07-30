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
                    <h3 class="box-title text-center">All News</h3>
                    <p class="text-muted text-center"> List of org. news </p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: right;" href="/admin/news/create"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-plus mx-2"></span> Add News Article
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        @if(count($news) > 0)
                            <table class="table text-nowrap table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="border-top-0"><b></b></th>
                                    <th class="border-top-0"><b>Title</b></th>
                                    <th class="border-top-0"><b>Body</b></th>
                                    <th class="border-top-0"><b>Created At</b></th>
                                    <th class="border-top-0"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $count = 1;
                                ?>
                                @foreach($news as $article )
                                    <tr>
                                        <td><img class="img-rounded img-thumbnail"
                                                 src="{{url('storage/news/'.$article->img_url)}}"
                                                 height="50" width="80"/></td>
                                        <td>{{ \Illuminate\Support\Str::of( $article->title)->words(10,'...')}}  <?php
                                            $file = !empty($article->attachment_url) ? '<a class="btn btn-sm btn-primary mx-2" target="_blank" href="' . url('storage/news/' . $article->attachment_url) . '">Attached File</a>' : '';
                                            echo $file;
                                            ?></td>
                                        <td>{{ \Illuminate\Support\Str::of( $article->body)->words(10,'...')}}</td>
                                        <td>{{$article->created_at}}</td>

                                        </td>
                                        <td>


                                            <form action="/admin/news/delete/{{$article->id}}" method="POST">
                                                @csrf
                                                @method('delete')


                                                <a href="/admin/news/edit/{{$article->id}}"
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
                            <p class="text-center text-danger alert alert-danger">No News added yet!</p>
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
