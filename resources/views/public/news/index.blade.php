@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


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
                                                 src="{{url('storage/news/'.$article->img_url)}}" alt="">
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
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
