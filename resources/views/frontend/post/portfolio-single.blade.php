@extends('frontend.post.layouts.app')


@section('main-content')
    <section class="page-title parallax">
        <div data-parallax="scroll" data-image-src="{{ URL::to('/') }}/media/portfolio/images/{{ $portfolio_single -> featured_image }}" class="parallax-bg"></div>
        <div class="parallax-overlay">
            <div class="centrize">
                <div class="v-center">
                    <div class="container">
                        <div class="title center">
                            <h1 class="upper">{{ $portfolio_single -> title }}<span class="red-dot"></span></h1>
                            <h4>{{ $portfolio_single -> sub_title }}</h4>
                            <hr>
                        </div>
                    </div>
                    <!-- end of container-->
                </div>
            </div>
        </div>
    </section>
    <section class="b-0">
        <div class="container">
            <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true, &quot;directionNav&quot;: true}" class="flexslider nav-inside">
                <ul class="slides">
                    <li>
                        <img src="{{ URL::to('/') }}/media/portfolio/images/{{ $portfolio_single -> featured_image }}" alt="">
                    </li>
                    <li>
                        <img src="{{ URL::to('/') }}/media/portfolio/images/{{ $portfolio_single -> featured_image }}" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="p-0 b-0">
        <div class="boxes">
            <div class="container-fluid">
                <div class="row">
                    <div data-bg-color="#eaeaea" class="col-md-4">
                        <div class="number-box"><span>Step No.</span>
                            <h2>01<span class="red-dot"></span></h2>
                            <h4>Redesign.</h4>
                            <p>Accusamus a, laboriosam autem animi similique iste harum doloribus quas fuga, minima error ea nihil eius repellat reprehenderit.</p>
                        </div>
                    </div>
                    <div data-bg-color="#f0f0f0" class="col-md-4">
                        <div class="number-box"><span>Step No.</span>
                            <h2>02<span class="red-dot"></span></h2>
                            <h4>Branding.</h4>
                            <p>Accusamus a, laboriosam autem animi similique iste harum doloribus quas fuga, minima error ea nihil eius repellat reprehenderit.</p>
                        </div>
                    </div>
                    <div data-bg-color="#f4f4f4" class="col-md-4">
                        <div class="number-box"><span>Step No.</span>
                            <h2>03<span class="red-dot"></span></h2>
                            <h4>Delivery.</h4>
                            <p>Accusamus a, laboriosam autem animi similique iste harum doloribus quas fuga, minima error ea nihil eius repellat reprehenderit.</p>
                        </div>
                    </div>
                </div>
                <!-- end of row-->
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="project-detail">
                        <p><strong>Client:</strong>Company Inc.</p>
                        <p><strong>Date:</strong>{{ date('F d, Y', strtotime($portfolio_single -> created_at)) }}</p>
                        <p><strong>Link:</strong><a href="#">companysite.com</a>
                        </p>
                        <p><strong>Type:</strong>Redesign, Branding, Website</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>{!! Str::of(htmlspecialchars_decode($portfolio_single -> discription)) -> words('50', '<span style="color:red;"> >>></span>') !!}</p>
                </div>
                <div class="col-sm-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis eum eveniet, facere libero ipsa fugiat nihil sit fuga odio, distinctio quasi veniam adipisci! Molestiae aperiam labore, neque assumenda error natus!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="controllers p-0">
        <div class="container">
            <div class="projects-controller"><a href="#" class="prev"><span><i class="ti-arrow-left"></i>Previous</span></a><a href="#" class="all"><span><i class="ti-layout-grid2"></i></span></a><a href="#" class="next"><span>Next<i class="ti-arrow-right"></i></span></a>
            </div>
        </div>
    </section>
@endsection
