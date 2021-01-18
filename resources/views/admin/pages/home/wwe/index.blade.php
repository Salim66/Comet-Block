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

                    $wwa_data = json_decode($home_page_info -> wwa);

                @endphp
                <div class="col-xl-10 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Who We Are</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <form action="{{ route('who.we.are.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Sub Title One</label>
                                    <div class="col-lg-9">
                                        <input name="sub_title_one" type="text" class="form-control" value="{{ $wwa_data -> sub_title_one }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Title One</label>
                                    <div class="col-lg-9">
                                        <input name="title_one" type="text" class="form-control" value="{{ $wwa_data -> title_one }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Description One</label>
                                    <div class="col-lg-9">
                                        <textarea name="description_one" rows="2" class="form-control">{{ $wwa_data -> description_one }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Sub Title Two</label>
                                    <div class="col-lg-9">
                                        <input name="sub_title_two" type="text" class="form-control" value="{{ $wwa_data -> sub_title_two }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Title Two</label>
                                    <div class="col-lg-9">
                                        <input name="title_two" type="text" class="form-control" value="{{ $wwa_data -> title_two }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Branding Title</label>
                                    <div class="col-lg-9">
                                        <input name="branding_title" type="text" class="form-control" value="{{ $wwa_data -> branding_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Branding Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="branding_description" rows="2" class="form-control">{{ $wwa_data -> branding_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Interactive Title</label>
                                    <div class="col-lg-9">
                                        <input name="interactive_title" type="text" class="form-control" value="{{ $wwa_data -> interactive_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Interactive Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="interactive_description" rows="2" class="form-control">{{ $wwa_data -> interactive_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Production Title</label>
                                    <div class="col-lg-9">
                                        <input name="production_title" type="text" class="form-control" value="{{ $wwa_data -> production_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Production Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="production_description" rows="2" class="form-control">{{ $wwa_data -> production_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Editing Title</label>
                                    <div class="col-lg-9">
                                        <input name="editing_title" type="text" class="form-control" value="{{ $wwa_data -> editing_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Editing Description</label>
                                    <div class="col-lg-9">
                                        <textarea name="editing_description" rows="2" class="form-control">{{ $wwa_data -> editing_description }}</textarea>
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
