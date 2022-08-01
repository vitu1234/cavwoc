@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/dummy-img-1920x300.jpg')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">GALLERY</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GALLERY</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- HOW TO HELP US -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="row popup-gallery gutter-5">
                        @if(count($gallery) > 0)
                            @foreach($gallery as $item)
                                <!-- ITEM 1 -->
                                    <div class="col-xs-6 col-md-3">
                                        <div class="box-gallery">
                                            <a href="{{url('storage/gallery/'.$item->img_url)}}" title="{{$item->title}}">
                                                <img style="height: 180px; width: 280px" src="{{url('storage/gallery/'.$item->img_url)}}" alt=""
                                                     class="img-fluid">
                                                <div class="project-info">
                                                    <div class="project-icon">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p style="width: 100%"
                                   class="mb-5 text-justify text-center text-danger alert alert-danger">No
                                    pictures in gallery found, please
                                    check again later!</p>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
