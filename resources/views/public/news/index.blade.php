@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/dummy-img-1920x300.jpg')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">NEWS</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">NEWS</li>
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
                                        <a href="/news/{{$article->id}}">
                                            <img style="height: 220px !important; width: 100%"
                                                 src="/storage/news/{{$article->img_url}}" alt="">
                                        </a>
                                    </div>
                                    <div class="body-content">
                                        <div style="height: 80px !important; margin-top: 5px;">
                                            <p style="max-height: 50px" class="title"><a
                                                    href="/news/{{$article->id}}">{{ \Illuminate\Support\Str::of($article->title)->words(20,'...')}}</a>
                                            </p>
                                            <div
                                                class="text text-justify text-dark">{{ \Illuminate\Support\Str::of( $article->body)->words(20,'...')}}
                                            </div>
                                        </div>
                                        <div class="spacer-30"></div>
                                        <a href="/news/{{$article->id}}" class="btn btn-primary">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p style="width: 100%" class="mb-5 text-justify text-center text-danger alert alert-danger">No
                            News articles found, please
                            check again later!</p>
                    @endif

                </div>

            </div>
        </div>
    </div>


    <!-- CTA -->
    <div class="section cta">
        <div class="content-wrap-20">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="cta-1">
                            <div class="body-text">
                                <h3>Join your hand with us for a better life and beautiful future.</h3>
                            </div>
                            <div class="body-action">
                                <a href="#" class="btn btn-secondary">DONATE NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('public.incl.footer')
@endsection
