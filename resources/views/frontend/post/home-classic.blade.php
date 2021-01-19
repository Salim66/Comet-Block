@extends('frontend.post.layouts.app')


@section('main-content')
    <!-- Home Section-->
    <section id="home">
        <!-- Home Slider-->
        @php

            $slider_info =  App\Models\CarouselSlider::where(['slide_status' => 'Active']) ->get();;
             foreach ($slider_info as $slider){
                 $slider_data = json_decode($slider->sliders);
             }
        @endphp
        <div id="home-slider" class="flexslider">
            <ul class="slides">
            @foreach($slider_data as $data)
                <li>
                    <img src="{{ URL::to('/') }}/media/sliders/images/{{ $data -> image }}" alt="">
                    <div class="slide-wrap">
                        <div class="slide-content">
                            <div class="container">
                                <h1>{{ $data -> title }}<span class="red-dot"></span></h1>
                                <h6>{{ $data -> sub_title }}</h6>
                                <p><a href="#" class="btn btn-light-out">{{ $data -> btn_title_one }}</a><a href="#" class="btn btn-color btn-full">{{ $data -> btn_title_two }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
        <!-- End Home Slider-->
    </section>

    <!-- End Home Section-->
    <section id="about">

        @php

            $home_page = App\Models\HomePage::find(1);
            $wwa_data = json_decode($home_page->wwa);

        @endphp

        <div class="container">
            <div class="title center">
                <h4 class="upper">{{ $wwa_data -> sub_title_one }}</h4>
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
                                    <h4 class="upper">{{ $wwa_data -> sub_title_two }}</h4>
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
        @php

            $home_page = App\Models\HomePage::find(1);
            $vision_data = json_decode($home_page -> vision);

        @endphp
        <div class="container">
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

            $settngs_info = App\Models\Settings::find(1);
            $clients_data = json_decode($settngs_info -> clients);

        @endphp
        <div class="container">
            <div class="title center">
                <h4 class="upper">{{ $clients_data -> upper }}</h4>
                <h3>{{ $clients_data -> client }}<span class="red-dot"></span></h3>
                <hr>
            </div>
            <div class="section-content">
                <div class="boxes clients">
                    <div class="row">
                        <div class="col-sm-4 col-xs-6 border-right border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_one }}" alt="" data-animated="true" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_two }}" alt="" data-animated="true" data-delay="500" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-bottom">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_three }}" alt="" data-animated="true" data-delay="1000" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_four }}" alt="" data-animated="true" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6 border-right">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_five }}" alt="" data-animated="true" data-delay="500" class="client-image">
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <img src="{{ URL::to('/') }}/media/settings/clients/{{ $clients_data -> clients_six }}" alt="" data-animated="true" data-delay="1000" class="client-image">
                        </div>
                    </div>
                    <!-- end of row-->
                </div>
            </div>
            <!-- end of section content-->
        </div>
    </section>

    @php

        $home_page = App\Models\HomePage::find(1);
        $testimonials_info = json_decode($home_page -> testimonials);

    @endphp

    <section class="parallax">
        <div data-parallax="scroll" data-image-src="frontend/images/bg/7.jpg" class="parallax-bg"></div>
        <div class="parallax-overlay pb-50 pt-50">
            <div class="container">
                <div class="title center">
                    <h3>{{ $testimonials_info -> title }}<span class="red-dot"></span></h3>
                    <hr>
                </div>
                <div class="section-content">
                    <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
                        <ul class="slides">
                            @foreach($testimonials_info -> descrip as $test_data)
                            <li>
                                <blockquote>
                                    <p>{{ $test_data -> description }}</p>
                                    <footer>{{ $test_data -> by }}</footer>
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
