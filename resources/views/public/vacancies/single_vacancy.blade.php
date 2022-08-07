@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


    <!-- CONTENT -->
    <!-- HOW TO HELP US -->
    {{--    <div class="section">--}}
    {{--        <div class="content-wrap">--}}
    {{--            <div class="container">--}}

    {{--                <div class="row">--}}
    {{--                    <div class="col-sm-12 col-md-12">--}}
    {{--                        <h2 class="color-secondary text-center"><span--}}
    {{--                                class="color-primary">{{$vacancy->project_name}}</span></h2>--}}
    {{--                        <p class="text-center">{{ucfirst($vacancy->project_type)}} Project--}}
    {{--                            : {{$vacancy->project_period}}</p>--}}

    {{--                    </div>--}}
    {{--                    <div class="col-sm-12 col-md-12">--}}
    {{--                        <img src="{{url('storage/projects/'.$vacancy->img_url)}}"--}}
    {{--                             style="height: 200px; display: block;--}}
    {{--  margin-left: auto;--}}
    {{--  margin-right: auto; "--}}
    {{--                             alt="" class="img-fluid img-rounded">--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="spacer-90"></div>--}}

    {{--                <div class="row">--}}


    {{--                    <div class="col-sm-2 col-md-2">--}}
    {{--                    </div>--}}
    {{--                    <div class="col-sm-8 col-md-8">--}}
    {{--                        <div class="container-fluid">--}}

    {{--                            <p class="uk18 color-secondary text-justify">--}}
    {{--                                {!! $vacancy->project_summary!!}--}}
    {{--                            </p>--}}

    {{--                            @if(!empty($vacancy->project_file))--}}
    {{--                                <div class="rs-box-download">--}}
    {{--                                    <div class="icon">--}}
    {{--                                        <i class="fa fa-file-pdf-o"></i>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="body">--}}
    {{--                                        <a target="_blank"--}}
    {{--                                           href="<?=url('storage/projects/' . $vacancy->project_file) ?>">--}}
    {{--                                            <h3>Download Project File</h3>--}}
    {{--                                            Click here to download .PDF--}}
    {{--                                        </a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                    <div class="col-sm-2 col-md-2">--}}
    {{--                    </div>--}}

    {{--                    <div class="col-sm-8 col-md-12">--}}

    {{--                        <div class="progress-fundraising progress-lg">--}}
    {{--                            <div class="total">Donated</div>--}}
    {{--                            <div class="persen">--}}
    {{--                                <?=round(($vacancy->amount_raised * 100) / $vacancy->budgeted_amount)?>%--}}
    {{--                            </div>--}}
    {{--                            <div class="progress">--}}
    {{--                                <div class="progress-bar" role="progressbar"--}}
    {{--                                     aria-valuenow="<?=round(($vacancy->amount_raised * 100) / $vacancy->budgeted_amount)?>"--}}
    {{--                                     aria-valuemin="0"--}}
    {{--                                     aria-valuemax="100"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="detail">--}}
    {{--                                <h3>${{number_format($vacancy->amount_raised,2)}} <small>Raised of</small>--}}
    {{--                                    ${{number_format($vacancy->budgeted_amount,2)}} <small>Goal</small></h3>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <a href="#" class="btn btn-primary">DONATE NOW</a>--}}

    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- CONTENT -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">


                        <div class="widget tags">
                            <div class="widget-title">
                                QUICK LINKS
                            </div>
                            <div class="tagcloud">
                                <a href="/about" title="3 topics">About Us</a>
                                <a href="/projects" title="1 topic">Projects</a>
                                <a href="/vacancies" title="4 topics">Vacancies</a>
                                <a href="/annual_reports" title="4 topics">Annual Reports</a>
                                <a href="/our_staff" title="2 topics">Our Staff</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-9 col-md-9">
                        @if(!empty($vacancy))
                            <div class="single-projects">
                                <div class="image">
                                    <img src="{{asset('images/logo_600_400.jpg')}}"
                                         style="height: 300px; width: 500px"
                                         alt="" class="img-fluid img-rounded">
                                </div>
                                <h2 class="blok-title text-dark">
                                    {{$vacancy->title}}
                                </h2>
                                <div class="meta">
                                    <div class="meta-date">
                                        {{$vacancy->dateline}}
                                    </div>

                                    <div class="meta-author invisible"> Funded by: <span></span></div>
                                    <div class="meta-category invisible"> Category: <a href="#">Industry</a>, <a
                                            href="#">Machine</a>
                                    </div>
                                    <div class="meta-comment invisible"><i class="fa fa-comment-o"></i> 2 Comments</div>

                                </div>
                                <hr/>

                                <p class="text-justify text-dark">
                                    {!! $vacancy->body !!}
                                </p>


                            </div>
                        @else
                            <p class="text-danger text-center alert alert-danger m-5" style="width: 100%;">Requested
                                vacancy not found, please check <a href="/vacancies">HERE</a></p>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>





    @include('public.incl.cta')
    @include('public.incl.footer')
@endsection
