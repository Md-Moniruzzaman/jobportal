@extends('layouts.main')

@section('content')
    <div class="unit-5 overlay" style="background-image: url({{asset('partial/images/hero_1.jpg')}});">
        <div class="container text-center">
            <h2 class="mb-0">Categories / Candidates</h2>
            <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep">></span> <span>Categories</span></p>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Popular Categories</h2>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Category::all() as $cat)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{route('Category.index',[$cat->id])}}" class="h-100 feature-item">
                            <span class="d-block icon flaticon-calculator mb-3 text-primary"></span>
                            <h2>{{$cat->name}}</h2>
                            <span class="counting">10,391</span>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">

                    <div class="img-border">
                        <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                            <img src="partial/images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                        </a>
                    </div>

                </div>
                <div class="col-md-5 ml-auto">
                    <div class="text-left mb-5 section-heading">
                        <h2>Testimonies</h2>
                    </div>

                    <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nisi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nobis magni eaque velit eum, id rem eveniet dolor possimus voluptas..&rdquo;</p>
                    <p>&mdash; <strong class="text-black font-weight-bold">John Holmes</strong>, Marketing Strategist</p>
                    <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0 order-md-2">

                    <div class="img-border">
                        <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                            <img src="partial/images/hero_2.jpg" alt="Image" class="img-fluid rounded">
                        </a>
                    </div>

                </div>
                <div class="col-md-5 ml-auto order-md-1">
                    <div class="text-left mb-5 section-heading">
                        <h2>Creative People</h2>
                    </div>

                    <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nisi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nobis magni eaque velit eum, id rem eveniet dolor possimus voluptas..&rdquo;</p>
                    <p>&mdash; <strong class="text-black font-weight-bold">John Holmes</strong>, Marketing Strategist</p>
                    <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection