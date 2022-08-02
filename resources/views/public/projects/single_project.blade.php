@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/dummy-img-1920x300.jpg')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">PROJECT DETAIL</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">PROJECT DETAIL</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <!-- HOW TO HELP US -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="color-secondary text-center"><span
                                class="color-primary">{{$project->project_name}}</span></h2>
                        <p class="text-center">{{ucfirst($project->project_type)}} Project
                            : {{$project->project_period}}</p>

                    </div>
                    <div class="col-sm-12 col-md-12">
                        <img src="{{url('storage/projects/'.$project->img_url)}}"
                             style="height: 200px; display: block;
  margin-left: auto;
  margin-right: auto; "
                             alt="" class="img-fluid img-rounded">
                    </div>
                </div>

                <div class="spacer-90"></div>

                <div class="row">


                    <div class="col-sm-2 col-md-2">
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="container-fluid">

                            <p class="uk18 color-secondary text-justify">
                                {!! $project->project_summary!!}
                            </p>

                            @if(!empty($project->project_file))
                                <div class="rs-box-download">
                                    <div class="icon">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                    <div class="body">
                                        <a target="_blank"
                                           href="<?=url('storage/projects/' . $project->project_file) ?>">
                                            <h3>Download Project File</h3>
                                            Click here to download .PDF
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-2 col-md-2">
                    </div>

                    <div class="col-sm-8 col-md-12">

                        <div class="progress-fundraising progress-lg">
                            <div class="total">Donated</div>
                            <div class="persen">
                                <?=round(($project->amount_raised * 100) / $project->budgeted_amount)?>%
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     aria-valuenow="<?=round(($project->amount_raised * 100) / $project->budgeted_amount)?>"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="detail">
                                <h3>${{number_format($project->amount_raised,2)}} <small>Raised of</small>
                                    ${{number_format($project->budgeted_amount,2)}} <small>Goal</small></h3>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary">DONATE NOW</a>

                    </div>

                </div>

            </div>
        </div>
    </div>




    @include('public.incl.cta')
    @include('public.incl.footer')
@endsection
