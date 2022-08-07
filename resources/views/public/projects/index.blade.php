@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


    <!-- HOW TO HELP US -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">

                    @if(count($projects) > 0)
                        <table style="width:100%" class="table table-borderless" id="news_table">
                            <tr>
                                <td>
                                    <div class="row" style="justify-content: center">
                                        @foreach($projects as $project)
                                            <div class="col-sm-3 col-md-3">
                                                <div class="box-fundraising"
                                                     style="height: 400px !important; overflow: hidden;">
                                                    <a href="/projects/{{$project->id}}">
                                                        <div class="media">
                                                            <img style="height: 200px !important; width: 100%"
                                                                 src="{{url('storage/projects/'.$project->img_url)}}"
                                                                 alt="">
                                                        </div>
                                                        <div class="body-content">
                                                            <div style="height: 80px !important; margin-top: 5px;">
                                                                <p class="title"><a
                                                                        href="/projects/{{$project->id}}">{{ \Illuminate\Support\Str::of($project->project_name)->words(8,'...')}}</a>
                                                                </p>
                                                                <span class="text-warning mt-3 mb-3 "><span
                                                                        class="fa fa-clock-o"></span> {{$project->project_type}}</span>
                                                                <div class="text text-dark text-justify">
                                                                    {{ \Illuminate\Support\Str::of($project->project_summary)->words(12,'...')}}
                                                                </div>
                                                            </div>
                                                            <div class="progress-fundraising mt-5">
                                                                <div class="total">
                                                                    <small>${{number_format($project->amount_raised,2)}}
                                                                        /${{number_format($project->budgeted_amount,2)}}</small>
                                                                </div>

                                                                <a href="/projects/{{$project->id}}"
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
                            Projects found, please
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
