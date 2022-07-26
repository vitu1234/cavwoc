@extends('public.layouts.app')

@section('content')
    <!-- BANNER -->
    <div id="oc-fullslider" class="slider-area mt-1">


        <div class="bend niceties preview-2">
            <div id="slider" class="slides">

            <?php
            foreach ($carousels as $carousel) {
                echo '<img src="' . url('storage/carousel/' . $carousel->img_url) . '" alt="" title="#htmlcaption' . $carousel->id . '" />';
            }

            ?>


            <!--  <img src="images/banner_new4.png" alt="" title="#slider-direction-2" />
                 <img src="images/banner_new5.png" alt="" title="#slider-direction-3" />
                  <img src="images/banner_new3.png" alt="" title="#slider-direction-4" />
                   <img src="images/banner_new1.png" alt="" title="#slider-direction-5" />
                   <img src="images/images/banner2.png" alt="" title="#slider-direction-6" />
                 <img src="images/images/banner3.png" alt="" title="#slider-direction-7" /> -->
            </div>


        <?php

        foreach ($carousels as $row) {
        ?>
        <!-- This part of caption is called from the second image link above see  `#htmlcaption` there -->
            <div id="htmlcaption<?=$row->id?>" class="nivo-html-caption">

                <h4><b><?=$row->title?></b></h4>

                <p><?=$row->subtitle?></p>
                <br/>
            </div>

            {{--            <div id="slider-direction-<?= $row->id ?>" class="slider-direction slider-one">--}}
            {{--                <div class="container">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-12 col-sm-12 col-xs-12">--}}
            {{--                            <div class="slider-content">--}}
            {{--                                <!-- layer 1 -->--}}
            {{--                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s"--}}
            {{--                                     data-wow-delay=".2s">--}}
            {{--                                    <h2 class="title1"><?= $row->title ?> </h2>--}}
            {{--                                </div>--}}
            {{--                                <!-- layer 2 -->--}}
            {{--                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">--}}
            {{--                                    <h1 class="title2"><?= $row->subtitle ?></h1>--}}
            {{--                                </div>--}}
            {{--                                <!-- layer 3 -->--}}
            {{--                                <!----}}
            {{--                                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">--}}
            {{--                                                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>--}}
            {{--                                                </div>--}}
            {{--                                -->--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <?php
            }

            ?>


        </div>


        {{--        <div id="slider" class="nivoSlider">--}}
        {{--            @foreach($carousels as $carousel )--}}
        {{--                <img id="slider-direction{{$carousel->id}}" src="{{url('storage/carousel/'.$carousel->img_url)}}" title="{{$carousel->title}}"--}}
        {{--                     data-thumb="{{url('storage/carousel/'.$carousel->img_url)}}" alt=""/>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}


        {{--        @if(count($carousels) > 0)--}}
        {{--            @foreach($carousels as $carousel )--}}
        {{--                <div class="owl-slide">--}}
        {{--                    <div class="item">--}}
        {{--                        <img style="" src="{{url('storage/carousel/'.$carousel->img_url)}}"--}}
        {{--                             alt="Slider">--}}
        {{--                        <div class="slider-pos">--}}
        {{--                            <div class="container">--}}
        {{--                                <div class="" style="">--}}
        {{--                                    <h1 class="caption-heading "><span>{{$carousel->title}}</span></h1>--}}
        {{--                                    <p class="bg">{{$carousel->subtitle}}</p>--}}
        {{--                                    --}}{{--                                    <a href="#" class="btn btn-primary">DONATE NOW</a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endforeach--}}
        {{--        @else--}}

        {{--            <div class="owl-slide">--}}
        {{--                <div class="item">--}}
        {{--                    <img src="images/dummy-img-1920x900.jpg" alt="Slider">--}}
        {{--                    <div class="slider-pos">--}}
        {{--                        <div class="container">--}}
        {{--                            <div class="wrap-caption right">--}}
        {{--                                <h1 class="caption-heading bg"><span>#EndViolence</span> For Every Woman</h1>--}}
        {{--                                <p class="bg">remipsum dolor sit amet consectetur adipisicing</p>--}}
        {{--                                <a href="#" class="btn btn-primary">DONATE NOW</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        @endif--}}
    </div>

    <div class="clearfix"></div>

    <!-- ABOUT US -->
    <div id="about" class="section section-border">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h2 class="section-heading">
                            Welcome <span>To</span> CAVWOC
                        </h2>

                        <p class="text-dark text-justify">
                            Women and Children in Malawi face a lot of challenges in terms of inequalities, physical and
                            sexual abuses, forced marriages and economic deprivation. Centre for Alternatives for
                            Victimized Women and Children (CAVWOC) believes a society free from gender based violence
                            and all forms of abuse against children and women is possible in Malawi. In order to achieve
                            this, CAVWOC provides the following to communities it works in:
                        </p>
                        <ul class="text-dark text-justify">
                            <li>
                                Capacity building of community structures and justice providers to reduce occurrences of
                                Gender Based Violence (GBV).
                            </li>
                            <li>
                                Access to knowledge on and utilization of Sexual Reproductive Health services including
                                HIV and AIDS.
                            </li>
                            <li>
                                Promotion of quality, safe and equitable education for girls.
                            </li>
                            <li>
                                Promotion of use of safe and portable water and uptake of standard sanitary and hygiene
                                practices.
                            </li>

                        </ul>

                        <div class=""></div>
                        <a href="/about" class="btn btn-primary">READ MORE <span class="fa fa-chevron-right"></span></a>
                        <div class="spacer-30"></div>

                    </div>

                    <div class="col-sm-6 col-md-6">

                        <img src="{{asset('images/logo_600_400.jpg')}}" alt="Logo CAVWOC" class="img-fluid img-border">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PROJECTS -->
    <div id="" class="section">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading center">
                            Recent <span>Projects </span>
                        </h2>
                        {{--                        <p class="subheading text-center">Lorem ipsum dolor sit amet, onsectetur adipiscing cons ectetur--}}
                        {{--                            nulla. Sed at ullamcorper risus.</p>--}}
                    </div>
                    <div class="clearfix"></div>

                    @if(count($projects) > 0)
                        @foreach($projects as $project)
                            <div class="col-sm-4 col-md-4">
                                <div class="box-fundraising" style="height: 400px !important; overflow: hidden;">
                                    <a href="/projects/{{$project->id}}">
                                        <div class="media">
                                            <img style="height: 200px !important; width: 100%"
                                                 src="{{url('storage/projects/'.$project->img_url)}}" alt="">
                                        </div>
                                        <div class="body-content">
                                            <div style="height: 80px !important; margin-top: 5px;">
                                                <p class="title"><a
                                                        href="/projects/{{$project->id}}">{{ \Illuminate\Support\Str::of($project->project_name)->words(20,'...')}}</a>
                                                </p>
                                                <span class="text-warning mt-3 mb-3 "><span
                                                        class="fa fa-clock-o"></span> {{$project->project_type}}</span>
                                                <div class="text text-dark text-justify">
                                                    {{ \Illuminate\Support\Str::of($project->project_summary)->words(15,'...')}}
                                                </div>
                                            </div>
                                            <div class="progress-fundraising mt-5">
                                                <div class="total"><small>${{number_format($project->amount_raised,2)}}
                                                        /${{number_format($project->budgeted_amount,2)}}</small></div>
                                                <a href="/projects/{{$project->id}}"
                                                   class="btn btn-sm btn-primary text-light"
                                                   style="float: right;">Read More</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12 col-md-12">
                            <div class="spacer-40"></div>
                            <div class="text-center">
                                <a href="/projects" class="btn btn-primary">SEE ALL PROJECTS</a>
                            </div>
                            <br/>
                            <br/>
                        </div>
                    @else
                        <p style="width: 100%" class="mb-5 text-justify text-center text-danger alert alert-danger">No
                            Projects found, please
                            check again later!</p>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <!-- NEWS -->
    <div class="section" style="background-color: rgba(204,204,204,0.45)">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading center">
                            Recent <span>News </span>
                        </h2>

                    </div>

                @if(count($news) > 0)
                    @foreach($news as $article)
                        <!-- Item 1 -->
                            <div class="col-sm-4 col-md-4">
                                <div class="box-fundraising">
                                    <div class="media">
                                        <div class="meta-date">
                                            <div
                                                class="date">{{ Carbon\Carbon::parse($article->created_at)->format('d')}}</div>
                                            <div
                                                class="month">{{ Carbon\Carbon::parse($article->created_at)->format('M')}}</div>
                                        </div>
                                        <a href="/news/{{$article->id}}"><img
                                                style="height: 220px !important; width: 100%"
                                                src="{{url('storage/news/'.$article->img_url)}}" alt=""></a>
                                    </div>
                                    <div class="body-content">
                                        <div style="height: 80px !important; margin-top: 5px;">
                                            <p style="max-height: 50px" class="title"><a
                                                    href="/news/{{$article->id}}">{{ \Illuminate\Support\Str::of($article->title)->words(10,'...')}}</a>
                                            </p>
                                            <div
                                                class="text text-justify text-dark">{{ \Illuminate\Support\Str::of( $article->body)->words(15,'...')}}
                                            </div>
                                        </div>
                                        <div class="spacer-30"></div>
                                        <a href="/news/{{$article->id}}" class="btn btn-primary">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12 col-md-12">
                            <div class="spacer-40"></div>
                            <div class="text-center">
                                <a href="/news" class="btn btn-primary">SEE ALL NEWS</a>
                            </div>
                            <br/>
                            <br/>
                        </div>
                    @else
                        <p style="width: 100%" class="mb-5 text-justify text-center text-danger alert alert-danger">No
                            News articles found, please
                            check again later!</p>
                    @endif


                </div>

            </div>
        </div>
    </div>


    <!-- OUR VOLUUNTER SAYS -->
    @if(count($others_say) > 0)

        <div class="section">
            <div class="">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <h2 class="section-heading center">
                                What <span>Others</span> Say
                            </h2>
                            <p class="subheading text-center">Here's' what people have to say about us
                                Including patrons, donors, the communities.</p>
                        </div>


                        @foreach($others_say as $say)
                            <div class="col-sm-6 col-md-6">
                                <div class="testimonial-1">
                                    <div class="media">
                                        <img src="{{url('storage/others_say/'.$say->profile_picture)}}" alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="body">
                                        <p class="text-justify text-dark">{{$say->what_they_say}}</p>
                                        <div class="title">{{$say->fullname}} - <small>{{$say->profession}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(count($others_say) > 4)
                            <div class="col-sm-12 col-md-12">
                                <div class="spacer-40"></div>
                                <div class="text-center">
                                    <a href="/others_say" class="btn btn-primary">SEE ALL </a>
                                </div>
                                <br/>
                                <br/>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="section" style="height: 10px">
            <div class="bg-light">
                <div class="container">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    @endif

    <!-- OUR PARTNERS -->

    @if(count($partners) > 0)
        <div class="section bg-light">
            <div class=" pb-5">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <h2 class="section-heading center">
                                Our <span>Partners</span>
                            </h2>
                            <p class=" text-center text-dark">Here are some of our partners we work with to improve the
                                future.</p>
                        </div>

                    </div>

                    <div class="container">
                        <section class="customer-logos slider">
                            @foreach($partners as $partner)
                                <div class="slide">
                                    <a target="_blank" href="{{$partner->link}}">
                                        <img
                                            src="{{url('storage/partners/'.$partner->img_url)}}"
                                        />
                                    </a>
                                </div>
                            @endforeach

                        </section>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="section" style="height: 10px">
            <div class="bg-light">
                <div class="container">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    @endif

    <!-- OUR PARTNERS -->


    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
