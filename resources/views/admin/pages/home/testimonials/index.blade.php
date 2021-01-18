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
            @php

                $testimonials_info = json_decode($home_page->testimonials);

            @endphp
            <div class="row">
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Home Page Testimonials</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <form action="{{ route('testimonials.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Title</label>
                                    <div class="col-lg-9">
                                        <input name="title" type="text" class="form-control" value="{{ $testimonials_info -> title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="comet-slider-testimonials">
                                            @foreach( $testimonials_info -> descrip as $descript )
                                                <div class="card shadow" id="slider-card-{{ $descript -> slide_code }}" style="position: relative; left: 0px; top: 0px;">
                                                    <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-{{ $descript -> slide_code }}"><h4>#Slider {{ $descript -> slide_code }} <span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-test-copy-btn" copy_id='{{ $descript -> slide_code }}' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='{{ $descript -> slide_code }}' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>
                                                    <div id="slide-{{ $descript -> slide_code }}" class="collapse" style="">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="">Description</label>
                                                                <textarea name="description[]" rows="2" class="form-control" description='{{ $descript -> slide_code }}'>{{ $descript -> description }}</textarea>
                                                                <input name="slide_code[]" type="hidden" class="form-control" value='{{ $descript -> slide_code }}'>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">By</label>
                                                                <input name="by[]" type="text" class="form-control" by='{{ $descript -> slide_code }}' value="{{ $descript -> by }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Add Slider</label>
                                    <div class="col-lg-9">
                                        <input type="button" class=" btn btn-primary comet-add-slide" id="comet-add-slide-testimonials" value="Add New Slider">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection



{{--<div class="card shadow" id="slider-card-{{ $data -> slider_code }}">--}}
{{--    <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-{{ $data -> slider_code }}"><h4>#Slider {{ $data -> slider_code }}<button id="comet-slide-remove-btn" class="close btn btn-danger trash" remove_id='{{ $data -> slider_code }}'><i class="fas fa-trash"></i></button></h4></div>--}}
{{--    <div id="slide-{{ $data -> slider_code }}" class="collapse">--}}
{{--        <div class="card-body">--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Sub Title</label>--}}
{{--                <input name="subtitle[]" type="text" class="form-control" value="{{ $data -> sub_title }}">--}}
{{--                <input name="slide_code[]" type="hidden" class="form-control" value='{{ $data -> slider_code }}'>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Title</label>--}}
{{--                <input name="title[]" type="text" class="form-control" value="{{ $data -> title }}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Button 01 Title</label>--}}
{{--                <input name="btntitle_01[]" type="text" class="form-control" value="{{ $data -> btn_title_01 }}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Button 01 Link</label>--}}
{{--                <input name="btnlink_01[]" type="text" class="form-control" value="{{ $data -> btn_link_01 }}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Button 02 Title</label>--}}
{{--                <input name="btntitle_02[]" type="text" class="form-control" value="{{ $data -> btn_title_02 }}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Button 02 Link</label>--}}
{{--                <input name="btnlink_02[]" type="text" class="form-control" value="{{ $data -> btn_link_02 }}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
