@extends('public.layouts.app')

@section('content')
    <!-- BANNER -->
    <div id="oc-fullslider" class="banner owl-carousel">
        <div class="owl-slide">
            <div class="item">
                <img src="images/dummy-img-1920x900.jpg" alt="Slider">
                <div class="slider-pos">
                    <div class="container">
                        <div class="wrap-caption">
                            <h1 class="caption-heading bg"><span>#EndViolence</span> For Every Woman</h1>
                            <p class="bg">Remipsum dolor sit amet consectetur adipisicing</p>
                            <a href="#" class="btn btn-primary">DONATE NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-slide">
            <div class="item">
                <img src="images/dummy-img-1920x900.jpg" alt="Slider">
                <div class="slider-pos">
                    <div class="container">
                        <div class="wrap-caption center">
                            <h1 class="caption-heading bg"><span>#EndViolence</span> For Every Woman</h1>
                            <p class="bg">remipsum dolor sit amet consectetur adipisicing</p>
                            <a href="#" class="btn btn-primary">DONATE NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-slide">
            <div class="item">
                <img src="images/dummy-img-1920x900.jpg" alt="Slider">
                <div class="slider-pos">
                    <div class="container">
                        <div class="wrap-caption right">
                            <h1 class="caption-heading bg"><span>#EndViolence</span> For Every Woman</h1>
                            <p class="bg">remipsum dolor sit amet consectetur adipisicing</p>
                            <a href="#" class="btn btn-primary">DONATE NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <a href="#" class="btn btn-primary">READ MORE <span class="fa fa-arrow-right"></span></a>
                        <div class="spacer-30"></div>

                    </div>

                    <div class="col-sm-6 col-md-6">

                        <img src="images/dummy-img-600x400.jpg" alt="" class="img-fluid img-border">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WE NEED YOUR HELP -->
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
                    <!-- Item 1 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising" style="height: 450px !important; overflow: hidden;">
                            <a href="#">
                                <div class="media">
                                    <img src="images/dummy-img-600x400.jpg" alt="">
                                </div>
                                <div class="body-content">
                                    <p class="title"><a href="cause-single.html">Improving Secondary Education in Malawi
                                            (ISEM)</a></p>
                                    <div class="text">
                                        Two learners hold up the happiness and sadness boxes used to report abuse at
                                        Chisugulu secondary school in Phalombe...
                                    </div>
                                    <div class="progress-fundraising">
                                        <div class="total"><small>$2,580/$3,000</small></div>
                                        <a class="btn btn-sm btn-primary text-light" style="float: right;">Donate</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising" style="height: 450px !important; overflow: hidden;">
                            <a href="#">
                                <div class="media">
                                    <img src="images/dummy-img-600x400.jpg" alt="">
                                </div>
                                <div class="body-content">
                                    <p class="title"><a href="cause-single.html">Local Rights Programme</a></p>
                                    <div class="text">
                                        Girl poses as a national treasure, entitled to rights as a Malawian Citizen, a
                                        National Champion to be....
                                    </div>
                                    <div class="progress-fundraising">
                                        <div class="total"><small>$1,580/$2,000</small></div>
                                        <a class="btn btn-sm btn-primary text-light" style="float: right;">Donate</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising" style="height: 450px !important; overflow: hidden;">
                            <a href="#">
                                <div class="media">
                                    <img src="images/dummy-img-600x400.jpg" alt="">
                                </div>
                                <div class="body-content">
                                    <p class="title"><a href="cause-single.html">Combating Sexual/School Gender Based
                                            Violence Among Boys And Girls In Primary School For Increased Retention</a>
                                    </p>
                                    <div class="text">
                                        Standard 6& 7 girls and their teacher Mrs Nyorongo Ulongwe 2 primary school,
                                        Balaka....
                                    </div>
                                    <div class="progress-fundraising">
                                        <div class="total"><small>$2,580/$3,000</small></div>
                                        <a class="btn btn-sm btn-primary text-light" style="float: right;">Donate</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="spacer-40"></div>
                        <div class="text-center">
                            <a href="cause.html" class="btn btn-primary">SEE ALL PROJECTS</a>
                        </div>
                        <br/>
                        <br/>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- URGENT CAUSE -->
    <div class="section" style="background-color: #cccccc">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading center">
                            Recent <span>News </span>
                        </h2>
                        {{--                        <p class="subheading text-center">Lorem ipsum dolor sit amet, onsectetur adipiscing cons ectetur--}}
                        {{--                            nulla. Sed at ullamcorper risus.</p>--}}
                    </div>
                    <!-- Item 1 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising">
                            <div class="media">
                                <div class="meta-date">
                                    <div class="date">02</div>
                                    <div class="month">AUG</div>
                                </div>
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                            <div class="body-content">
                                <p class="title"><a href="events-single.html">EDUCATION FOR SYRIAN CHILD</a></p>
                                <div class="meta">
                                    <span class="date"><i class="fa fa-clock-o"></i>  12:00 am - 5:00 pm</span>
                                    <span class="location"><i class="fa fa-map-marker"></i> Montreal, Canada</span>
                                </div>
                                <div class="text">Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste
                                    natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam,
                                    eaque ipsa quae ab illo invent.
                                </div>
                                <div class="spacer-30"></div>
                                <a href="events-single.html" class="btn btn-primary">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising">
                            <div class="media">
                                <div class="meta-date">
                                    <div class="date">10</div>
                                    <div class="month">AUG</div>
                                </div>
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                            <div class="body-content">
                                <p class="title"><a href="events-single.html">HOME FOR KAMPAR'S CHILD</a></p>
                                <div class="meta">
                                    <span class="date"><i class="fa fa-clock-o"></i>  12:00 am - 5:00 pm</span>
                                    <span class="location"><i class="fa fa-map-marker"></i> Montreal, Canada</span>
                                </div>
                                <div class="text">Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste
                                    natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam,
                                    eaque ipsa quae ab illo invent.
                                </div>
                                <div class="spacer-30"></div>
                                <a href="events-single.html" class="btn btn-primary">READ MORE</a>

                            </div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="col-sm-4 col-md-4">
                        <div class="box-fundraising">
                            <div class="media">
                                <div class="meta-date">
                                    <div class="date">21</div>
                                    <div class="month">AUG</div>
                                </div>
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                            <div class="body-content">
                                <p class="title"><a href="events-single.html">CLEAN WATER FOR SOUTH SUDAN'S</a></p>
                                <div class="meta">
                                    <span class="date"><i class="fa fa-clock-o"></i>  12:00 am - 5:00 pm</span>
                                    <span class="location"><i class="fa fa-map-marker"></i> Montreal, Canada</span>
                                </div>
                                <div class="text">Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste
                                    natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam,
                                    eaque ipsa quae ab illo invent.
                                </div>
                                <div class="spacer-30"></div>
                                <a href="events-single.html" class="btn btn-primary">READ MORE</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- OUR VOLUUNTER SAYS -->
    <div class="section">
        <div class="">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading center">
                            What <span>Others</span> Say
                        </h2>
                        <p class="subheading text-center">Heres' what people have to say about us
                            Including patrons, donors, the communities.</p>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="testimonial-1">
                            <div class="media">
                                <img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum
                                    has been. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Nulla
                                    interdum dapibus erat nec elementum. </p>
                                <div class="title">John Doel</div>
                                <div class="company">Businessman</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="testimonial-1">
                            <div class="media">
                                <img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum
                                    has been. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Nulla
                                    interdum dapibus erat nec elementum. </p>
                                <div class="title">Raisa Doel</div>
                                <div class="company">House Keeper</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="testimonial-1">
                            <div class="media">
                                <img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum
                                    has been. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Nulla
                                    interdum dapibus erat nec elementum. </p>
                                <div class="title">Josh Doel</div>
                                <div class="company">Contractor</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="testimonial-1">
                            <div class="media">
                                <img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum
                                    has been. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Nulla
                                    interdum dapibus erat nec elementum. </p>
                                <div class="title">Sasha Doel</div>
                                <div class="company">Freelance</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- OUR PARTNERS -->
    <div class="section" style="background-color: #cccccc">
        <div class="">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading center">
                            Our <span>Partners</span>
                        </h2>
                        <p class=" text-center text-light">Here are some of our partners we work with to improve the
                            future.</p>
                    </div>

                </div>
                <div class="row gutter-5">
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="#"><img src="images/dummy-img-200x125.jpg" alt="" class="img-fluid img-border"></a>
                    </div>

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
