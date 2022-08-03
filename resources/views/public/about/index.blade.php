@extends('public.layouts.app')

@section('content')

    <!-- BANNER -->
    @include('public.incl.banner')


    <!-- CONTENT -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading text-center">
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
                            <li>
                                Support in increase of household food security and income.
                            </li>

                        </ul>
                        <p class="text-dark text-justify">
                            We are a social service organization formed in 1997 and registered under the Trustees
                            Incorporation Act of Malawi in 1998. We are affiliated to Council for Non-Governmental
                            Organizations in Malawi (CONGOMA), NGO Board of Malawi, NGOGCN and the Human Rights
                            Consultative Committee.
                        </p>
                        <p class="text-dark text-justify">
                            CAVWOC was established with the sole purpose of providing technical and psychosocial support
                            to women and children that are survivors of gender based violence and sexual reproductive
                            health rights violations. As a local NGO, we support the rights of women and children in
                            Malawi. We work to empower abused, vulnerable and marginalized women and children in order
                            to provide them with knowledge, counsel and assistance in regards to their rights that will
                            transform them from the state of being victimized and vulnerable into socially and
                            economically empowered members of society.
                        </p>
                        <div class="spacer-30"></div>

                    </div>


                </div>

                {{--                <div class="spacer-70"></div>--}}

                <div class="row bg-light p-4">

                    <div class="col-sm-12 col-md-4">
                        <div class="rs-icon-funfact style-2">

                            <div class="body-content">
                                <h4 class="text-center">Our Mission</h4><br/>
                                <p class="uk18 text-justify text-dark">We exist to reduce gender based violence by
                                    protecting and
                                    supporting
                                    women and children who have been victimized; preventing future occurrences of the
                                    same through the provision and reinforcement of long lasting solutions that deal
                                    with the causes of Gender Based Violence.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="rs-icon-funfact style-2">

                            <div class="body-content">
                                <h4 class="text-center">Our Vision</h4><br/>
                                <p class="uk18 text-justify text-justify text-dark">We envision a just Malawi in which
                                    all women and children
                                    are able to pursue their rights to live a healthy, socially and economically
                                    empowered life. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="rs-icon-funfact style-2">

                            <div class="body-content">
                                <h4 class="">Our Values</h4>
                                <br/>
                                <ul class="uk18 text-justify text-dark">
                                    <li>Honesty</li>
                                    <li>Transparency</li>
                                    <li>Accountability</li>
                                    <li>Openness</li>
                                    <li>Non-discrimination</li>
                                    <li>Equality</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="spacer-40"></div>
                        <br/>
                        <br/>
                        <div class="text-center">
                            <a href="/our_staff" class="btn btn-primary">View Our Staff <i class="fa fa-chevron-right"></i></a>
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
