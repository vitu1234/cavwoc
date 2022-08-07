@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


    <!-- HOW TO HELP US -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">

                    @if(count($annual_reports) > 0)
                        <table style="width:100%" class="table table-borderless" id="news_table">
                            <tr>
                                <td>
                                    <div class="row" style="justify-content: center">
                                        @foreach($annual_reports as $project)
                                            <div class="col-sm-4 col-md-4">
                                                <div class="box-fundraising"
                                                     style="height: 400px !important; overflow: hidden;">
                                                    <a href="/annual_reports/{{$project->id}}">
                                                        <div class="media">
                                                            <img style="height: 200px !important; width: 100%"
                                                                 src="{{asset('images/logo_600_400.jpg')}}"
                                                                 alt="">
                                                        </div>
                                                        <div class="body-content">
                                                            <div style="height: 80px !important; margin-top: 5px;">
                                                                <p class="title"><a
                                                                        href="/annual_reports/{{$project->id}}">{{ \Illuminate\Support\Str::of($project->title)->words(8,'...')}}</a>
                                                                </p>

                                                                <div class="text text-dark text-justify">
                                                                    {{ \Illuminate\Support\Str::of($project->description)->words(12,'...')}}
                                                                </div>
                                                            </div>
                                                            <div class="progress-fundraising mt-5">
                                                                <div class="total">
                                                                    <a class="btn btn-sm btn-primary mx-1"
                                                                       target="_blank"
                                                                       href="{{url('storage/annual_reports/' . $project->report_url)}}"><i
                                                                            class="fa fa-download"></i> Full
                                                                        Report</a>
                                                                </div>

                                                                <a href="/annual_reports/{{$project->id}}"
                                                                   class="btn btn-sm btn-primary text-light"
                                                                   style="float: right;">Read More</a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="col-sm-12 col-md-12">
                            <div class="spacer-40"></div>

                            <br/>
                            <br/>
                        </div>
                    @else
                        <p style="width: 100%" class="mb-5 text-justify text-center text-danger alert alert-danger">No
                            Annual reports found, please
                            check again later!</p>
                    @endif

                </div>

            </div>
        </div>
    </div>


    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
