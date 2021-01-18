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


            <div class="row">
                @php

                    $vision_data = json_decode($home_page -> vision);

                @endphp
                <div class="col-xl-10 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Our Vision</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <form action="{{ route('our.vision.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Sub Title One</label>
                                    <div class="col-lg-9">
                                        <input name="sub_title_one" type="text" class="form-control" value="{{ $vision_data -> sub_title_one }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Title One</label>
                                    <div class="col-lg-9">
                                        <input name="title_one" type="text" class="form-control" value="{{ $vision_data -> title_one }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag One Title</label>
                                    <div class="col-lg-9">
                                        <input name="tag_one_title" type="text" class="form-control" value="{{ $vision_data -> tag_one_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag One Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="tag_one_description" rows="2" class="form-control">{{ $vision_data -> tag_one_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Two Title</label>
                                    <div class="col-lg-9">
                                        <input name="tag_two_title" type="text" class="form-control" value="{{ $vision_data -> tag_two_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Two Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="tag_two_description" rows="2" class="form-control">{{ $vision_data -> tag_two_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Three Title</label>
                                    <div class="col-lg-9">
                                        <input name="tag_three_title" type="text" class="form-control" value="{{ $vision_data -> tag_three_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Three Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="tag_three_description" rows="2" class="form-control">{{ $vision_data -> tag_three_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Four Title</label>
                                    <div class="col-lg-9">
                                        <input name="tag_four_title" type="text" class="form-control" value="{{ $vision_data -> tag_four_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tag Four Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="tag_four_description" rows="2" class="form-control">{{ $vision_data -> tag_four_description }}</textarea>
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
