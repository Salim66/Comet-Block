@extends('layouts.app')

@section('main')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user() -> name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <h3>Create Your Slider</h3>
            <select class="custom-select" id="trail">
                <option selected>---Select---</option>
                <option value="video">Block Slider</option>
                <option value="carousel">Carousel Slider</option>
                <option value="showcase">Showcase Slider</option>
                <option value="standard">Standard Slider</option>
            </select>


            <!--/Start Block Slider Modal -->
            <div class="modal fade" id="comet_slider_modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: lightpink">
                            <h4 class="card-title">Home Page Block Slider</h4><button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="background-color: lightblue">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Slider Video</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label for="sf" class="btn btn-primary rounded shadow"><i class="fas fa-play-circle"></i>Upload File</label>
                                                <input name="slider_video" type="file" class="d-none" id="sf">
                                            </div>
                                            <div class="col-lg-5">
                                                <video width="100" height="70" style="margin-top: -20px;" class="shadow" autoplay id="show_slider_video">
                                                    <source src="" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="comet-slider-container">


                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Add Slider</label>
                                    <div class="col-lg-9">
                                        <input type="button" class="btn btn-primary comet-add-slide shadow" id="comet-add-slide" value="Add New Slide">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary shadow">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--/End Block Slider Modal -->

            <!--/Start Carousel Slider Modal -->
            <div class="modal fade" id="comet_carosul_slider_modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: lightpink">
                            <h4 class="card-title">Home Page Carousel Slider</h4><button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="background-color: lightblue">
                            <form action="{{ route('carousel.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="comet-carosul-slider-container">



                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Add Slider</label>
                                    <div class="col-lg-9">
                                        <input type="button" class="btn btn-primary comet-add-slide shadow" id="comet-add-carousel-slide" value="Add New Slide">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary shadow">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--/End Carousel Slider Modal -->


{{--        Start All Block Slider Show--}}
            <slection style=" display: block; margin-top: 50px">
                <h4>Block Sliders</h4>
                <hr>
                <div class="row">
                    @php

                       foreach ($block_slider_info as $slider) :
                           $slider_data = json_decode($slider -> sliders);

                    @endphp

                    <div class="col-lg-4">

                        <div class="card shadow" id="card">

                            <div class="embed-responsive embed-responsive-16by9 h-100">
                                <iframe class="embed-responsive-item" src="{{ URL::to('/') }}/media/sliders/video/{{ $slider_data -> slider_video_url }}" allowfullscreen></iframe>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    <span class="spinner-grow spinner-grow-sm"></span><a id="show_slider" href="#" edit_id="{{ $slider -> id }}" data-toggle="modal" class="text-white">Preview</a>
                                </button>

                                @if($slider -> slide_status == 'Active')
                                    <span class="text-white ml-5 badge badge-success">Active</span>
                                @else
                                    <span class="text-white ml-5 badge badge-warning">Inactive</span>
                                @endif
                                <label class="float-right">
                                    @if($slider -> slide_status == 'Active')
                                    <a href="{{ route('slider.inactive', $slider -> id) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye-slash"></i></a>
                                    @else
                                        <a href="{{ route('slider.active', $slider -> id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @endif
                                </label>
                                <form class="d-inline-block " style="float: right; margin-right: 2px;" action="{{ route('slider.destroy', $slider -> id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                        endforeach;
                    @endphp
                </div>
            </slection>{{--        End All Block Slider Show--}}



{{--         Start Block Preview/live Slider Modal--}}
            <div id="slide_individual_show_modal" class="modal fade">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 798px; height: 448px;">
                                <button class="close" id="remove_slider_caption" data-dismiss="modal" style="position: absolute; top: 0; right: 0; z-index: 4;">&times;</button>
                                <div class="carousel-inner slider_info" id="slider_add_caption">
                                    <div class="embed-responsive embed-responsive-16by9" style="position: relative; z-index: 0; opacity: 70%;">
                                        <iframe class="embed-responsive-item" src="" allowfullscreen autplay="none"></iframe>
                                    </div>


                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                    </div>
                </div>
            </div>{{--         End Block Preview/live Slider Modal--}}





            {{--        Start All Carousel Slider Show--}}
            <slection style=" display: block; margin-top: 50px">
                <h4>Carousel Sliders</h4>
                <hr>
                <div class="row">
                    @php
                        $carousel_slider_info = App\Models\CarouselSlider::latest() -> get();
                        foreach ($carousel_slider_info as $slider) :



                    @endphp

                    <div class="col-lg-4">

                        <div class="card shadow" id="card">
                            <img src="{{ URL::to('/') }}/media/sliders/images/6d4a36f0fc65f212bf6510686d03605a.jpg" alt="">
                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    <span class="spinner-grow spinner-grow-sm"></span><a id="show_carousel_slider" href="#" edit_id="{{ $slider -> id }}" data-toggle="modal" class="text-white">Live View</a>
                                </button>

                                @if($slider -> slide_status == 'Active')
                                    <span class="text-white ml-5 badge badge-success">Active</span>
                                @else
                                    <span class="text-white ml-5 badge badge-warning">Inactive</span>
                                @endif
                                <label class="float-right">
                                    @if($slider -> slide_status == 'Active')
                                        <a href="{{ route('carousel.slider.inactive', $slider -> id) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye-slash"></i></a>
                                    @else
                                        <a href="{{ route('carousel.slider.active', $slider -> id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @endif
                                </label>
                                <form class="d-inline-block " style="float: right; margin-right: 2px;" action="{{ route('carousel.slider.destroy', $slider -> id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                       endforeach;
                    @endphp
                </div>
            </slection>{{--        End All Carousel Slider Show--}}




            {{--         Start Carousel live Slider Modal--}}
            <div id="carousel_slider_individual_show_modal" class="modal fade">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <button class="close" id="remove_slider_caption" data-dismiss="modal" style="position: absolute; top: 0; right: 0; z-index: 4;">&times;</button>
                            <div class="carousel-inner slider_info" id="carousel_slider_add_caption">



                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>{{--         End Carousel live Slider Modal--}}




        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection








{{--<div class="carousel-item text-white todo" style="position: absolute; z-index: 1; margin-top: -300px; margin-left: 100px;">--}}
{{--    <li style="list-style: none">--}}
{{--        <div class="slide-wrap">--}}
{{--            <div class="slide-content text-left bold-text">--}}
{{--                <div class="container">--}}
{{--                    <h6>This is me.</h6>--}}
{{--                    <h1 class="upper">Asraful Haque<span class="red-dot"></span></h1>--}}
{{--                    <p><a href="#" class="btn btn-outline-success mr-1">Read More</a><a href="#" class="btn btn-outline-danger btn-full">Subscribe</a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--</div>--}}

