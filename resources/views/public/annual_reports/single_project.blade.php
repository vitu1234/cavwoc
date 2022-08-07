@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


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
                                <a href="/donations" title="4 topics">Donations</a>
                                <a href="/our_staff" title="2 topics">Our Staff</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-9 col-md-9">
                        @if(!empty($report))
                            <div class="single-news">
                                <div class="image">
                                    <img src="{{asset('images/logo_600_400.jpg')}}"
                                         style="height: 300px; width: 500px"
                                         alt="" class="img-fluid img-rounded">
                                </div>
                                <h2 class="blok-title">
                                    {{$report->title}}
                                </h2>
                                <div class="meta">
                                    <div class="meta-date invisible"><i
                                            class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($report->created_at)->format('M')}} {{ Carbon\Carbon::parse($report->created_at)->format('d')}}
                                        , {{ Carbon\Carbon::parse($report->created_at)->format('Y')}}</div>

                                    <div class="meta-author invisible"> Posted by: <a href="#">Rome Doel</a></div>
                                    <div class="meta-category invisible"> Category: <a href="#">Industry</a>, <a
                                            href="#">Machine</a>
                                    </div>
                                    <div class="meta-comment invisible"><i class="fa fa-comment-o"></i> 2 Comments</div>

                                </div>
                                <p class="text-justify text-dark">
                                    {{$report->description}}
                                </p>
                                <hr/>
                                <blockquote>
                                    <b>Full report</b>
                                    <footer><a class="btn btn-sm btn-primary mt-3" target="_blank"
                                               href="<?=url('storage/annual_reports/' . $report->report_url) ?>"><i
                                                class="fa fa-download"></i> Download</a>
                                    </footer>
                                </blockquote>


                            </div>
                        @else
                            <p class="text-danger text-center alert alert-danger m-5" style="width: 100%;">Requested
                                annual report not found, please check <a href="/annual_reports">HERE</a></p>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>



    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
