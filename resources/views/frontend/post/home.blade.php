@extends('frontend.post.layouts.app')



@section('main-content')

    @php
        $home_page_info = App\Models\HomePage::find(1);
        $slider_data = json_decode($home_page_info -> sliders);
    @endphp

    <section id="home">
        <!-- Video background-->
        <div id="video-wrapper" data-fallback-bg="frontend/images/bg/5.jpg">
{{--            <div data-property="{videoURL: '{{ $slider_data -> slider_video_url}}' }" class="player"></div>--}}
            <video controls autoplay="autoplay" loop="loop">
                <source src="{{ URL::to('/') }}/media/sliders/video/{{ $slider_data -> slider_video_url}}" type="video/mp4">
            </video>
        </div>
        <!-- end of video background-->

        <!-- Home Slider-->
        <div id="home-slider" class="flexslider">
            <ul class="slides">
                @foreach($slider_data -> slider as $data)
                <li>
                    <div class="slide-wrap">
                        <div class="slide-content text-left bold-text">
                            <div class="container">
                                <h6>{{ $data -> sub_title }}.</h6>
                                <h1 class="upper">{{ $data -> title }}<span class="red-dot"></span></h1>
                                <p><a href="#" class="btn btn-light-out">{{ $data -> btn_title_01 }}</a><a href="#" class="btn btn-color btn-full">{{ $data -> btn_title_02 }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- end of home slider-->
    </section>
    <!-- end of home section-->

    @php

        $wwa_data = json_decode($home_page_info -> wwa);

    @endphp
    <section id="about">
        <div class="container">
            <div class="title center">
                <h4 class="upper">{{ $wwa_data -> sub_title_one }}.</h4>
                <h2>{{ $wwa_data -> title_one }}<span class="red-dot"></span></h2>
                <hr>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="lead-text serif text-center">{{ $wwa_data -> description_one }}</p>
                    </div>
                </div>
                <!-- end of row-->
            </div>
            <!-- end of section content-->
        </div>
        <!-- end of container-->
    </section>
    <section class="p-0 b-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-4 img-side img-left mb-0">
                    <div class="img-holder">
                        <img src="frontend/images/bg/33.jpg" alt="" class="bg-img">
                        <div class="centrize">
                            <div class="v-center">
                                <div class="title txt-xs-center">
                                    <h4 class="upper">{{ $wwa_data -> sub_title_two }}.</h4>
                                    <h3>{{ $wwa_data -> title_two }}<span class="red-dot"></span></h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of side background image-->
                <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                    <div class="services">
                        <div class="row">
                            <div class="col-sm-6 border-bottom border-right">
                                <div class="service"><i class="icon-focus"></i><span class="back-icon"><i class="icon-focus"></i></span>
                                    <h4>{{ $wwa_data -> branding_title }}</h4>
                                    <hr>
                                    <p class="alt-paragraph">{{ $wwa_data -> branding_description }}</p>
                                </div>
                                <!-- end of service-->
                            </div>
                            <div class="col-sm-6 border-bottom">
                                <div class="service"><i class="icon-layers"></i><span class="back-icon"><i class="icon-layers"></i></span>
                                    <h4>{{ $wwa_data -> interactive_title }}</h4>
                                    <hr>
                                    <p class="alt-paragraph">{{ $wwa_data -> interactive_description }}</p>
                                </div>
                                <!-- end of service-->
                            </div>
                            <div class="col-sm-6 border-bottom border-right">
                                <div class="service"><i class="icon-mobile"></i><span class="back-icon"><i class="icon-mobile"></i></span>
                                    <h4>{{ $wwa_data -> production_title }}</h4>
                                    <hr>
                                    <p class="alt-paragraph">{{ $wwa_data -> production_description }}</p>
                                </div>
                                <!-- end of service-->
                            </div>
                            <div class="col-sm-6 border-bottom">
                                <div class="service"><i class="icon-globe"></i><span class="back-icon"><i class="icon-globe"></i></span>
                                    <h4>{{ $wwa_data -> editing_title }}</h4>
                                    <hr>
                                    <p class="alt-paragraph">{{ $wwa_data -> editing_description }}</p>
                                </div>
                                <!-- end of service-->
                            </div>
                        </div>
                    </div>
                    <!-- end of row-->
                </div>
            </div>
            <!-- end of row -->
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-4 img-side img-right">
                    <div class="img-holder">
                        <img src="frontend/images/bg/10.jpg" alt="" class="bg-img">
                    </div>
                </div>
                <!-- end of side background image-->
            </div>
            <!-- end of row-->
        </div>
        <div class="container">
            @php

                $vision_data = json_decode($home_page_info -> vision);

            @endphp
            <div class="row">
                <div class="col-md-5 col-sm-8">
                    <div class="title">
                        <h4 class="upper">{{ $vision_data -> sub_title_one }}</h4>
                        <h3>{{ $vision_data -> title_one }}<span class="red-dot"></span></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-box">
                                <h4 class="upper small-heading">{{ $vision_data -> tag_one_title }}</h4>
                                <p>{{ $vision_data -> tag_one_description }}</p>
                            </div>
                            <!-- end of text box-->
                        </div>
                        <div class="col-sm-6">
                            <div class="text-box">
                                <h4 class="upper small-heading">{{ $vision_data -> tag_two_title }}</h4>
                                <p>{{ $vision_data -> tag_two_description }}</p>
                            </div>
                            <!-- end of text box-->
                        </div>
                        <div class="col-sm-6">
                            <div class="text-box">
                                <h4 class="upper small-heading">{{ $vision_data -> tag_three_title }}</h4>
                                <p>{{ $vision_data -> tag_three_description }}</p>
                            </div>
                            <!-- end of text box-->
                        </div>
                        <div class="col-sm-6">
                            <div class="text-box">
                                <h4 class="upper small-heading">{{ $vision_data -> tag_four_title }}</h4>
                                <p>{{ $vision_data -> tag_four_description }}</p>
                            </div>
                            <!-- end of text box-->
                        </div>
                    </div>
                    <!-- end of row              -->
                </div>
            </div>
            <!-- end of row-->
        </div>
        <!-- end of container-->
    </section>
    <section id="portfolio" class="pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title m-0 txt-xs-center txt-sm-center">
                        <h2 class="upper">Selected Works<span class="red-dot"></span></h2>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul id="filters" class="no-fix mt-25">
                        <li data-filter="*" class="active">All</li>
                        <li data-filter=".branding">Branding</li>
                        <li data-filter=".graphic">Graphic</li>
                        <li data-filter=".printing">Printing</li>
                        <li data-filter=".video">Video</li>
                    </ul>
                    <!-- end of portfolio filters-->
                </div>
            </div>
            <!-- end of row-->
        </div>
        <div class="section-content pb-0">
            <div id="works" class="four-col wide mt-50">
                <div class="work-item branding video">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/1.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Neleman Cava</h3>
                                        <p>Branding, Video</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item graphic printing">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/7.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Sweet Lane</h3>
                                        <p>Graphic, Printing</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item printing branding">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/6.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Jeff Burger</h3>
                                        <p>Printing, Branding</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item video graphic">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/9.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Juice Meds</h3>
                                        <p>Video, Graphic</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item branding graphic">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/11.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Prisma</h3>
                                        <p>Graphic, Branding</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item printing graphic">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/10.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Delirio Tropical</h3>
                                        <p>Printing, Graphic</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item printing branding">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/8.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Amendoas</h3>
                                        <p>Printing, Branding</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="work-item graphic video">
                    <div class="work-detail">
                        <a href="portfolio-single-1.html">
                            <img src="frontend/images/portfolio/3.jpg" alt="">
                            <div class="work-info">
                                <div class="centrize">
                                    <div class="v-center">
                                        <h3>Hnina</h3>
                                        <p>Graphic, Video</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end of portfolio grid-->
        </div>
    </section>
    <section>
        @php
            $settings = App\Models\Settings::find(1);
            $clients_json = $settings -> clients;
            $clients_info = json_decode($clients_json);
        @endphp
        <div class="container">
            <div class="title center">
                <h4 class="upper">{{ $clients_info -> upper }}.</h4>
                <h3>{{ $clients_info -> client }}<span class="red-dot"></span></h3>
                <hr>
            </div>
            <div class="section-content">
                <div class="boxes clients">
                    <div class="row">
                        <div class="col-sm-4 col-xs-6 border-right border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_one }}" alt="" data-animated="true" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_two }}" alt="" data-animated="true" data-delay="500" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_three }}" alt="" data-animated="true" data-delay="1000" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_four }}" alt="" data-animated="true" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_five }}" alt="" data-animated="true" data-delay="500" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_info -> clients_six }}" alt="" data-animated="true" data-delay="1000" class="client-image">
                        </div>
                    </div>
                    <!-- end of row-->
                </div>
            </div>
            <!-- end of section content-->
        </div>
    </section>

    @php

        $testimonials_data = json_decode($home_page_info -> testimonials);

    @endphp

    <section class="parallax">
        <div data-parallax="scroll" data-image-src="frontend/images/bg/7.jpg" class="parallax-bg"></div>
        <div class="parallax-overlay pb-50 pt-50">
            <div class="container">
                <div class="title center">
                    <h3>{{ $testimonials_data -> title }}<span class="red-dot"></span></h3>
                    <hr>
                </div>
                <div class="section-content">
                    <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
                        <ul class="slides">
                            @foreach($testimonials_data -> descrip as $data)
                            <li>
                                <blockquote>
                                    <p>{{ $data -> description }}</p>
                                    <footer>{{ $data -> by }}</footer>
                                </blockquote>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of container-->
        </div>
    </section>
    <section>
        <div class="container">
            <div class="title center">
                <h4 class="upper">We have a few tips for you.</h4>
                <h2>The Blog<span class="red-dot"></span></h2>
                <hr>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="blog-post">
                            <div class="post-body">
                                <h3 class="serif"><a href="#">Checklists for Startups</a></h3>
                                <hr>
                                <p class="serif">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab corporis eos quod libero doloremque odio perspiciatis ratione cumque ex laboriosam, laborum accusantium quis quidem excepturi, adipisci neque, aliquam ea! [...]</p>
                                <div class="post-info upper"><a href="#">Read More</a><span class="pull-right black-text">November 16, 2015</span>
                                </div>
                            </div>
                            <!-- end of blog post-->
                        </div>
                        <div class="blog-post">
                            <div class="post-body">
                                <h3 class="serif"><a href="#">Never Tell People What You Do</a></h3>
                                <hr>
                                <p class="serif">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab corporis eos quod libero doloremque odio perspiciatis ratione cumque ex laboriosam, laborum accusantium quis quidem excepturi, adipisci neque, aliquam ea! [...]</p>
                                <div class="post-info upper"><a href="#">Read More</a><span class="pull-right black-text">November 12, 2015</span>
                                </div>
                            </div>
                            <!-- end of blog post-->
                        </div>
                    </div>
                </div>
                <!-- end of row-->
                <div class="clearfix"></div>
                <div class="mt-25">
                    <p class="text-center"><a href="#" class="btn btn-color-out">View Full Blog          </a>
                    </p>
                </div>
            </div>
            <!-- end of container-->
        </div>
    </section>

@endsection
