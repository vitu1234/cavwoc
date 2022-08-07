<!-- BANNER -->
<div class="section banner-page" data-background="{{asset('images/banner1.jpg')}}">
    <div class="content-wrap pos-relative">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            @if(Request::path() == 'contact_us')
                <div class="title-page">CONTACT US</div>
            @elseif(Request::path() == 'vacancies')
                <div class="title-page">VACANCIES</div>
            @elseif(Request::path() == 'gallery')
                <div class="title-page">GALLERY</div>
            @elseif(Request::path() == 'news')
                <div class="title-page">NEWS</div>
            @elseif(Request::path() == 'projects')
                <div class="title-page">PROJECTS</div>
            @elseif(Request::path() == 'about')
                <div class="title-page">ABOUT US</div>
            @elseif(Request::path() == 'our_staff')
                <div class="title-page">OUR STAFF</div>
            @elseif(Request::is('news/*'))
                <div class="title-page">NEWS</div>
            @elseif(Request::is('projects/*'))
                <div class="title-page">PROJECTS</div>
            @endif

        </div>
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    @if(Request::path() == 'contact_us')
                        <li class="breadcrumb-item active" aria-current="page">GALLERY
                        </li>
                    @elseif(Request::path() == 'vacancies')
                        <li class="breadcrumb-item active" aria-current="page">VACANCIES</li>
                    @elseif(Request::path() == 'gallery')
                        <li class="breadcrumb-item active" aria-current="page">GALLERY</li>
                    @elseif(Request::path() == 'news')
                        <li class="breadcrumb-item active" aria-current="page">NEWS</li>
                    @elseif(Request::path() == 'projects')
                        <li class="breadcrumb-item active" aria-current="page">PROJECTS</li>
                    @elseif(Request::path() == 'about')
                        <li class="breadcrumb-item active" aria-current="page">ABOUT US</li>
                    @elseif(Request::path() == 'our_staff')
                        <li class="breadcrumb-item active" aria-current="page">OUR STAFF</li>
                    @elseif(Request::is('news/*'))
                        <li class="breadcrumb-item active" aria-current="page">NEWS</li>
                    @elseif(Request::is('projects/*'))
                        <li class="breadcrumb-item active" aria-current="page">PROJECTS</li>
                    @else

                    @endif

                </ol>
            </nav>
        </div>
    </div>
</div>
