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
                    <h3 class="box-title text-center">Edit News</h3>
                    <p class="text-muted text-center"> View/Edit news article on form below</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <a style="float: left;" href="/admin/news"
                               class="btn  btn-primary mx-2 mb-3">
                                <span class="fa fa-arrow-left mx-2"></span> Back
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-  body">


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
                                             src="{{url('storage/news/'.$news->img_url)}}"
                                        />
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>


                            <form enctype="multipart/form-data" method="POST"
                                  action="/admin/news/update/{{$news->id}}"
                                  class="form-horizontal form-material">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Image - Thumbnail</label>
                                            <input accept=".png, .jpg, .jpeg" name="img_url" type="file"
                                                   placeholder=""
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Document - Attachment
                                                File <?php $file = !empty($news->attachment_url) ? '<a class="btn btn-sm btn-primary mx-2" target="_blank" href="' . url('storage/news/' . $news->attachment_url) . '">View File</a>' : ''; echo $file; ?></label>
                                            <input accept="application/pdf" name="attachment_url" type="file"
                                                   placeholder=""
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Title</label>
                                            <input value="{{$news->title}}" required name="title"
                                                   type="text"
                                                   placeholder="Ex: This is a heading"
                                                   class="form-control p-0 border-0">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="p-0">Body</label>
                                            <textarea name="body"
                                                      placeholder="Ex: This is the   body of the article"
                                                      class="form-control p-0 border-0">
                                                {{$news->body}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-success">Save Article</button>
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
