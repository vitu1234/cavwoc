@extends('public.layouts.app')

@section('content')

    <style type="text/css">
        /* FontAwesome for working BootSnippet :> */
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        #team {
            background: #eee !important;
        }


        section {
            padding: 60px 0;
        }


        #team .card {
            border: none;
            background: #ffffff;
        }

        .image-flip:hover .backside,
        .image-flip.hover .backside {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
            border-radius: .25rem;
        }

        .image-flip:hover .frontside,
        .image-flip.hover .frontside {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .mainflip {
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -ms-transition: 1s;
            -moz-transition: 1s;
            -moz-transform: perspective(1000px);
            -moz-transform-style: preserve-3d;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
            position: relative;
        }

        .frontside {
            position: relative;
            -webkit-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            z-index: 2;
            margin-bottom: 30px;
        }

        .backside {
            position: absolute;
            top: 0;
            left: 0;
            background: white;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
            -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        }

        .frontside,
        .backside {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 1s;
            -moz-transform-style: preserve-3d;
            -o-transition: 1s;
            -o-transform-style: preserve-3d;
            -ms-transition: 1s;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
        }

        .frontside .card,
        .backside .card {
            min-height: 312px;
        }

        .backside .card a {
            font-size: 18px;
            color: #f8902d !important;
        }

        .frontside .card .card-title,
        .backside .card .card-title {
            color: #f8902d !important;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
    </style>

    <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/dummy-img-1920x300.jpg')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">OUR STAFF</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">OUR STAFF</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">

            <div class="row">
            @if(count($staff_members) > 0)
                @foreach($staff_members as $staff)
                    <!-- Team member -->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip">
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p><img class=" img-fluid"
                                                        src="{{url('storage/staff/'.$staff->img_url)}}"
                                                        alt="Staff Member Picture"></p>
                                                <h4 class="card-title">{{$staff->title}} {{$staff->staff_name}}</h4>
                                                <p class="card-text">{{$staff->position}}</p>
                                                <a href="#"
                                                   class="btn btn-primary btn-sm"><i
                                                        class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="backside">
                                        <div class="card">
                                            <div class="card-body text-center mt-4">
                                                <h4 class="card-title">{{$staff->title}} {{$staff->staff_name}}</h4>
                                                <p class="card-text"> {{$staff->staff_bio}}</p>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank"
                                                           href="mailto:{{$staff->staff_email}}">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="social-icon text-xs-center" target="_blank"
                                                           href="tel:{{$staff->staff_phone}}">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./Team member -->

                    @endforeach
                @else
                    <p style="width: 100%" class="mb-5 text-justify text-center text-danger alert alert-danger">
                        No staff members found, please
                        check again later!</p>
                @endif


            </div>
        </div>
    </section>
    <!-- Team -->



    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
