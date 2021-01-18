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
                $slider_data = '';
                foreach ($slider as $slider_info){
                    $slider_data = json_decode($slider_info -> sliders);
                }
            @endphp

            <div class="row">
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Home Page Slider</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Slider Video</label>
                                    <div class="col-lg-9">
                                        <input name="svideo" type="text" class="form-control" value="{{ $slider_data -> slider_video_url }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="comet-slider-container">

                                            @foreach($slider_data -> slider as $data)
                                                <div class="card shadow" id="slider-card-{{ $data -> slide_code }}" style="position: relative; left: 0px; top: 0px;">
                                                    <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-{{ $data -> slide_code }}"><h4>#Slider {{ $data -> slide_code }}<span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-copy-btn" copy_id='{{ $data -> slide_code }}' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='{{ $data -> slide_code }}' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>
                                                    <div id="slide-{{ $data -> slide_code }}" class="collapse" style="">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="">Sub Title</label>
                                                                <input name="subtitle[]" type="text" class="form-control" subtitle='{{ $data -> slide_code }}' value="{{ $data -> sub_title }}">
                                                                <input name="slide_code[]" type="hidden" class="form-control" value='{{ $data -> slide_code }}'>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input name="title[]" type="text" class="form-control" title='{{ $data -> slide_code }}' value="{{ $data -> title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 01 Title</label>
                                                                <input name="btntitle_01[]" type="text" class="form-control" btn_title_one="{{ $data -> slide_code }}" value="{{ $data -> btn_title_01 }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 01 Link</label>
                                                                <input name="btnlink_01[]" type="text" class="form-control" btn_link_one="{{ $data -> slide_code }}" value="{{ $data -> btn_link_01 }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 02 Title</label>
                                                                <input name="btntitle_02[]" type="text" class="form-control" btn_title_two="{{ $data -> slide_code }}" value="{{ $data -> btn_title_02 }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Button 02 Link</label>
                                                                <input name="btnlink_02[]" type="text" class="form-control" btn_link_two="{{ $data -> slide_code }}" value="{{ $data -> btn_link_02 }}">
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
                                        <input type="button" class=" btn btn-primary comet-add-slide" id="comet-add-slide" value="Add New Slide">
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
