@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


    <!-- CONTENT -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">

                    <div class="col-sm-8 col-md-8">
                        <!-- MAPS -->
                        <div class="maps-wraper">
                            <div id="cd-zoom-in"></div>
                            <div id="cd-zoom-out"></div>
                            <div id="maps" class="maps" data-lat="-7.452278" data-lng="112.708992"
                                 data-marker="images/cd-icon-location.png">
                            </div>
                        </div>
                        <div class="spacer-90"></div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                        <h2 class="section-heading">
                            Contact Details
                        </h2>

                        <div class="rs-icon-info">
                            <div class="info-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="info-text"> Malawi Posts Conference Centre, Kasungu Cresent Road, P.O Box 3196
                                Blantyre
                            </div>
                        </div>

                        <div class="rs-icon-info">
                            <div class="info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-text">cavwoc@gmail.com</div>
                        </div>

                        <div class="rs-icon-info">
                            <div class="info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-text">+265 999 589 463</div>
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading">
                            Send a <span>Message</span>
                        </h2>
                        <div class="section-subheading">Feel free to call us during working hours from 08:00 to 17:00
                        </div>
                        <div class="margin-bottom-50"></div>

                        <div class="content">
                            <form action="#" class="form-contact" id="contactForm" data-toggle="validator"
                                  novalidate="true">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="p_name" placeholder="Enter Name"
                                                   required="">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="p_email"
                                                   placeholder="Enter Email" required="">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="p_subject"
                                                   placeholder="Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="p_phone"
                                                   placeholder="Enter Phone Number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="p_message" class="form-control" rows="6"
                                              placeholder="Enter Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                                </div>
                            </form>
                            <div class="margin-bottom-50"></div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- CTA -->
    @include('public.incl.cta')

    @include('public.incl.footer')
@endsection
