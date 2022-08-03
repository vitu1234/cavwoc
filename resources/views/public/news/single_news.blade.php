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

                        <div class="widget widget-archive">
                            <div class="widget-title">
                                Related Articles
                            </div>
                            <ul style="">
                                @foreach($related_news as $article)
                                    <li class="list">
                                        <a class="text-dark"
                                           href="/news/{{$article->id}}">{{ \Illuminate\Support\Str::of($article->title)->words(10,'...')}}
                                            -
                                            <span class="text-muted">
                                                {{ Carbon\Carbon::parse($news->created_at)->format('M')}} {{ Carbon\Carbon::parse($news->created_at)->format('d')}}
                                            , {{ Carbon\Carbon::parse($news->created_at)->format('Y')}}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget tags">
                            <div class="widget-title">
                                QUICK LINKS
                            </div>
                            <div class="tagcloud">
                                <a href="/about" title="3 topics">About Us</a>
                                <a href="/projects" title="1 topic">Projects</a>
                                <a href="/vacancies" title="4 topics">Vacancies</a>
                                <a href="/our_staff" title="2 topics">Our Staff</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-9 col-md-9">
                        @if(!empty($news))
                            <div class="single-news">
                                <div class="image">
                                    <img src="{{url('storage/news/'.$news->img_url)}}"
                                         style="height: 300px; width: 500px"
                                         alt="" class="img-fluid img-rounded">
                                </div>
                                <h2 class="blok-title">
                                    {{$news->title}}
                                </h2>
                                <div class="meta">
                                    <div class="meta-date"><i
                                            class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($news->created_at)->format('M')}} {{ Carbon\Carbon::parse($news->created_at)->format('d')}}
                                        , {{ Carbon\Carbon::parse($news->created_at)->format('Y')}}</div>

                                    <div class="meta-author invisible"> Posted by: <a href="#">Rome Doel</a></div>
                                    <div class="meta-category invisible"> Category: <a href="#">Industry</a>, <a
                                            href="#">Machine</a>
                                    </div>
                                    <div class="meta-comment invisible"><i class="fa fa-comment-o"></i> 2 Comments</div>

                                </div>
                                <p class="text-justify text-dark">
                                    {{$news->body}}
                                </p>

                                @if(!empty($news->attachment_url))
                                    <blockquote>
                                        <b>Attached file to the article</b>
                                        <footer><a class="btn btn-sm btn-primary mt-3" target="_blank"
                                                   href="<?=url('storage/news/' . $news->attachment_url) ?>"><i
                                                    class="fa fa-download"></i> Download</a>
                                        </footer>
                                    </blockquote>
                                @endif

                            </div>
                        @else
                            <p class="text-danger text-center alert alert-danger m-5" style="width: 100%;">Requested
                                news article not found, please check <a href="/news">HERE</a></p>
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
